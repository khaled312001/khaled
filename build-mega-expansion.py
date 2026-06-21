"""Build a workflow script that expands every blog post to 3000-7000 SEO-optimized words EN + AR."""
import json

data = json.load(open("f:/Certificates/khaled/posts-need-expansion.json", encoding="utf-8"))
ALL_SLUGS = [p["slug"] for p in data]

SCRIPT_TPL = r'''export const meta = {
  name: 'mega-expand-blog',
  description: 'SEO-optimize and expand every blog post to 3000-7000 words EN + 3000-5000 words AR',
  phases: [
    { title: 'SEO research per post' },
    { title: 'Write expanded EN' },
    { title: 'Translate to Arabic' },
    { title: 'Verify both languages' },
  ],
}

const POSTS_DATA = __POSTS_JSON__;
const ALL_SLUGS = __SLUGS_JSON__;

const SEO_SCHEMA = {
  type: 'object',
  required: ['slug', 'primary_keyword', 'secondary_keywords', 'lsi_terms', 'serp_intent', 'outline'],
  properties: {
    slug: { type: 'string' },
    primary_keyword: { type: 'string' },
    secondary_keywords: { type: 'array', items: { type: 'string' }, minItems: 5, maxItems: 12 },
    lsi_terms: { type: 'array', items: { type: 'string' }, minItems: 8, maxItems: 20 },
    serp_intent: { type: 'string' },
    outline: { type: 'array', items: { type: 'string' }, minItems: 12, maxItems: 25 },
    target_word_count: { type: 'integer' },
    featured_snippet_target: { type: 'string' }
  }
}

const EN_SCHEMA = {
  type: 'object', required: ['slug', 'content_en'],
  properties: { slug: { type: 'string' }, content_en: { type: 'string', minLength: 18000 } }
}

const AR_SCHEMA = {
  type: 'object', required: ['slug', 'content_ar'],
  properties: { slug: { type: 'string' }, content_ar: { type: 'string', minLength: 12000 } }
}

const VER_SCHEMA = {
  type: 'object', required: ['pass'],
  properties: { pass: { type: 'boolean' }, en_words: { type: 'integer' }, ar_words: { type: 'integer' }, issues: { type: 'array' } }
}

// PHASE 1: SEO research per post
phase('SEO research per post')
const seoTasks = POSTS_DATA.map(function(p) {
  return function() {
    return agent(
      'You are an SEO strategist. Analyze this existing blog post and produce a comprehensive SEO research brief for expanding it to 3000-7000 words.\n\n' +
      'POST:\nslug: ' + p.slug + '\ntitle: ' + p.title + '\ncategory: ' + p.category + '\n\n' +
      'CURRENT CONTENT (English, ~' + p.content_en.length + ' chars):\n' + p.content_en.slice(0, 2500) + '\n...\n\n' +
      'PRODUCE:\n' +
      '1. primary_keyword: the single best high-intent keyword for this post (e.g. "hire laravel developer egypt", "next.js performance optimization", etc).\n' +
      '2. secondary_keywords: 5-12 supporting keywords (long-tail variations, related queries).\n' +
      '3. lsi_terms: 8-20 semantically related terms a top-ranking article would naturally include.\n' +
      '4. serp_intent: one sentence describing what searchers actually want (informational / commercial / transactional / navigational + context).\n' +
      '5. outline: 12-25 H2/H3 section titles that an exhaustive, top-ranking article would cover. Cover the WHOLE topic. Include: definitions, comparisons, common mistakes, step-by-step, real examples, FAQs, pricing/cost where relevant, when to / when not to, future outlook, related concepts.\n' +
      '6. target_word_count: integer between 3000 and 7000 reflecting topic depth.\n' +
      '7. featured_snippet_target: a short definition or numbered/bulleted answer that could win the position-zero featured snippet for the primary keyword.\n\n' +
      'Return strict JSON matching the schema. Be specific, not generic.',
      { label: 'seo:' + p.slug.slice(0, 30), phase: 'SEO research per post', schema: SEO_SCHEMA, effort: 'high' }
    )
  }
})

const seoResearch = (await parallel(seoTasks)).filter(Boolean)
log('SEO research done: ' + seoResearch.length + '/' + POSTS_DATA.length)

// PHASE 2: Write EN long-form
phase('Write expanded EN')
const enTasks = seoResearch.map(function(seo) {
  const orig = POSTS_DATA.find(function(p) { return p.slug === seo.slug })
  if (!orig) return null
  return function() {
    const otherSlugs = ALL_SLUGS.filter(function(s) { return s !== seo.slug }).slice(0, 14)
    const prompt = [
      'Write an SEO-optimized, comprehensive English blog post of ' + seo.target_word_count + ' words (strict minimum 3000, soft max 7000).',
      '',
      'METADATA:',
      'slug: ' + seo.slug,
      'title: ' + orig.title,
      'category: ' + orig.category,
      'primary_keyword: ' + seo.primary_keyword,
      'secondary_keywords: ' + seo.secondary_keywords.join(', '),
      'lsi_terms: ' + seo.lsi_terms.join(', '),
      'serp_intent: ' + seo.serp_intent,
      '',
      'OUTLINE TO FOLLOW (use each as h2 or h3; you may sub-divide):',
      seo.outline.map(function(s, i) { return (i + 1) + '. ' + s }).join('\n'),
      '',
      'FEATURED SNIPPET TARGET (include this near the top as a clear definition or list):',
      seo.featured_snippet_target,
      '',
      'ORIGINAL CONTENT (build on this, do NOT discard - all existing internal links and examples must be preserved):',
      '---',
      orig.content_en,
      '---',
      '',
      'STRICT REQUIREMENTS:',
      '1. WORD COUNT: 3000-7000 words. Hard minimum 3000. Aim for ' + seo.target_word_count + '.',
      '2. STRUCTURE: First paragraph is p class="lead" containing the primary keyword in the first 60 words. Then use the outline. End with explicit FAQ section (4-7 Q&A pairs).',
      '3. KEYWORD USAGE: Use primary_keyword 5-12 times across the article (NOT stuffed). Use 80% of secondary_keywords at least once. Sprinkle LSI terms naturally.',
      '4. INTERNAL LINKS: 8-12 internal links. Keep all original links. Add new ones from these slugs (most relevant): ' + otherSlugs.join(', ') + '. Format: a href="/blog/SLUG". Include /contact and /services.',
      '5. ADD at least 2 div class="post-callout" blocks (tips, warnings, stats).',
      '6. ADD at least 2 pre code blocks with realistic code (Laravel, Node.js, React, SQL, shell).',
      '7. ADD at least 1 blockquote with strong opinion.',
      '8. ADD a numbered list AND a bulleted list (for featured snippet potential).',
      '9. ADD an FAQ h2 section near the end with 4-7 questions using h3 for each question.',
      '10. VOICE: first-person Khaled Ahmed - senior full stack web dev, Cairo, 5+ years, 25+ shipped production projects across 7 countries (Egypt, Saudi Arabia, UAE, UK, Switzerland, France, Germany, Kuwait). Practical, opinionated, no marketing fluff. Real numbers and concrete examples.',
      '11. END with a strong CTA paragraph linking to /contact and offering a free consultation.',
      '12. HTML allowed tags ONLY: p, h2, h3, h4, ul, ol, li, strong, em, code, pre, a, blockquote, div class="post-callout".',
      '13. Do NOT add inline style attributes or script/style tags.',
      '14. Do NOT use the string HTML on a line by itself.',
      '',
      'Return JSON: slug, content_en (the full HTML body, 3000-7000 words).'
    ].join('\n')
    return agent(prompt, {
      label: 'write-en:' + seo.slug.slice(0, 28),
      phase: 'Write expanded EN',
      schema: EN_SCHEMA,
      effort: 'high'
    })
  }
}).filter(Boolean)

const expanded = (await parallel(enTasks)).filter(Boolean)
log('EN written: ' + expanded.length + '/' + seoResearch.length)

// PHASE 3: Translate to Arabic
phase('Translate to Arabic')
const arTasks = expanded.map(function(e) {
  return function() {
    return agent(
      'Translate this English blog post to natural fluent Arabic for khaledahmed.net. Output the content_ar HTML body for a PHP nowdoc.\n\n' +
      'slug: ' + e.slug + '\n\n' +
      'ENGLISH HTML (translate the text, preserve every HTML tag and attribute exactly):\n---\n' + e.content_en + '\n---\n\n' +
      'REQUIREMENTS:\n' +
      '1. Final Arabic word count: 3000-5000 words. Hard minimum 2800.\n' +
      '2. Preserve EVERY HTML tag: p, h2, h3, h4, ul, ol, li, strong, em, code, pre, a, blockquote, div class="post-callout", p class="lead".\n' +
      '3. Preserve every a href URL exactly. Translate only anchor text.\n' +
      '4. Code inside pre code stays as-is - translate any commentary around it.\n' +
      '5. Tech terms (Laravel, React, Node.js, AWS, Stripe, API, MVP, SaaS, SEO) stay in Latin script.\n' +
      '6. Voice: first-person Khaled Ahmed - Cairo-based senior full stack dev. Egyptian-leaning fus7a, practical, opinionated. Natural Arabic, NOT literal MT.\n' +
      '7. Do NOT use the string HTML on a line by itself.\n' +
      '8. Do NOT add inline style attributes.\n' +
      '9. Preserve the FAQ section structure (h2 then h3 questions).\n' +
      '10. End with a CTA link to /contact.\n\n' +
      'Return JSON: slug, content_ar.',
      { label: 'translate-ar:' + e.slug.slice(0, 26), phase: 'Translate to Arabic', schema: AR_SCHEMA, effort: 'high' }
    )
  }
})

const translated = (await parallel(arTasks)).filter(Boolean)
log('AR translated: ' + translated.length + '/' + expanded.length)

// PHASE 4: Verify both languages
phase('Verify both languages')
const verdicts = await parallel(expanded.map(function(e) {
  return function() {
    const t = translated.find(function(x) { return x.slug === e.slug })
    if (!t) return Promise.resolve({ pass: false, en_words: 0, ar_words: 0, issues: ['no AR'] })
    return agent(
      'Verify EN+AR for slug: ' + e.slug + '\n\nEN length chars: ' + e.content_en.length + ' (~ words: ' + Math.round(e.content_en.replace(/<[^>]+>/g, ' ').split(/\s+/).filter(Boolean).length) + ')\nAR length chars: ' + t.content_ar.length + '\n\nEN first 3k chars:\n' + e.content_en.slice(0, 3000) + '\n\nAR first 3k chars:\n' + t.content_ar.slice(0, 3000) + '\n\nCHECKS (default fail if uncertain):\n1. EN stripped word count >= 2800 (target was 3000-7000).\n2. AR stripped word count >= 2400.\n3. Both have >= 6 h2 headings.\n4. Both have >= 6 internal links to / prefixed URLs.\n5. Both have a FAQ-style section.\n6. Both have /contact CTA near end.\n7. Neither contains placeholder phrase or HTML on a line by itself.\n8. EN includes the primary keyword at least 4 times.\n\nReturn pass (boolean), en_words (int), ar_words (int), issues (array).',
      { label: 'verify:' + e.slug.slice(0, 30), phase: 'Verify both languages', schema: VER_SCHEMA }
    )
  }
}))

const final = expanded.map(function(e, i) {
  const t = translated.find(function(x) { return x.slug === e.slug })
  const v = verdicts[i] || {}
  return {
    slug: e.slug,
    content_en: e.content_en,
    content_ar: t ? t.content_ar : null,
    pass: v.pass === true,
    en_words: v.en_words,
    ar_words: v.ar_words,
    issues: v.issues || []
  }
})

const passed = final.filter(function(f) { return f.pass && f.content_ar })
const failedOnly = final.filter(function(f) { return !f.pass || !f.content_ar })

log('Verified passed: ' + passed.length + '/' + final.length)

return {
  posts: passed.map(function(f) { return { slug: f.slug, content_en: f.content_en, content_ar: f.content_ar } }),
  partial: final.filter(function(f) { return f.content_ar }).map(function(f) { return { slug: f.slug, content_en: f.content_en, content_ar: f.content_ar, en_words: f.en_words, ar_words: f.ar_words, pass: f.pass, issues: f.issues } }),
  failed: failedOnly.map(function(f) { return { slug: f.slug, issues: f.issues, has_ar: !!f.content_ar, en_words: f.en_words, ar_words: f.ar_words } }),
  summary: { total: POSTS_DATA.length, seo: seoResearch.length, expanded: expanded.length, translated: translated.length, passed: passed.length }
}
'''

SCRIPT_TPL = SCRIPT_TPL.replace("__POSTS_JSON__", json.dumps(data, ensure_ascii=False))
SCRIPT_TPL = SCRIPT_TPL.replace("__SLUGS_JSON__", json.dumps(ALL_SLUGS))

out_path = "C:/Users/KHALE/.claude/projects/F--Certificates-khaled/084e325f-5145-43cd-b865-8e31357b8706/workflows/scripts/mega-expand-blog.js"
open(out_path, "w", encoding="utf-8").write(SCRIPT_TPL)
print(f"Wrote {len(SCRIPT_TPL):,} bytes -> {out_path}")
