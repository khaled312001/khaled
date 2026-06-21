"""Build the workflow script with posts data embedded inline."""
import json

data = json.load(open("f:/Certificates/khaled/posts-need-expansion.json", encoding="utf-8"))
ALL_SLUGS = [p["slug"] for p in data]

SCRIPT = r'''export const meta = {
  name: 'expand-blog-posts',
  description: 'Expand all 18 blog posts to >= 2000 words EN and >= 2000 words AR',
  phases: [
    { title: 'Expand EN content' },
    { title: 'Translate to Arabic' },
    { title: 'Verify both languages' },
  ],
}

const POSTS_DATA = __POSTS_JSON__;
const ALL_SLUGS = __SLUGS_JSON__;

const EN_SCHEMA = {
  type: 'object', required: ['slug', 'content_en'],
  properties: { slug: { type: 'string' }, content_en: { type: 'string', minLength: 11000 } }
}
const AR_SCHEMA = {
  type: 'object', required: ['slug', 'content_ar'],
  properties: { slug: { type: 'string' }, content_ar: { type: 'string', minLength: 7000 } }
}
const VER_SCHEMA = {
  type: 'object', required: ['pass'],
  properties: { pass: { type: 'boolean' }, en_words: { type: 'integer' }, ar_words: { type: 'integer' }, issues: { type: 'array' } }
}

phase('Expand EN content')
const enTasks = POSTS_DATA.map(function(p) {
  return function() {
    const otherSlugs = ALL_SLUGS.filter(function(s) { return s !== p.slug }).slice(0, 12)
    const prompt = [
      'EXPAND this English blog post to be 2000-2800 words while preserving the original voice, structure, and existing internal links.',
      '',
      'POST METADATA:',
      'slug: ' + p.slug,
      'title: ' + p.title,
      'category: ' + p.category,
      '',
      'ORIGINAL ENGLISH CONTENT (build on this, do NOT discard it):',
      '---',
      p.content_en,
      '---',
      '',
      'EXPANSION REQUIREMENTS:',
      '1. Final word count: 2000-2800 words (strict minimum 2000).',
      '2. KEEP every existing h2, h3, p, ul, ol, a from the original - expand them with more depth, examples, code snippets, real numbers, and case studies from 25+ shipped projects across 7 countries.',
      '3. ADD 3-5 new h2 sections with substantive content. Suggested: common mistakes, concrete examples, when to / when NOT to, FAQs, decision frameworks, anonymous client scenarios.',
      '4. INTERNAL LINKS: Final post must have 6-10 internal links. Keep existing ones. Add 3-5 new ones using these slugs (most topically relevant): ' + otherSlugs.join(', ') + '. Format: a href="/blog/SLUG". Also include /contact and /services links.',
      '5. ADD at least one div class="post-callout" with a useful tip, warning, or stat.',
      '6. ADD at least one pre code block with realistic code (Laravel, Node.js, React, SQL, or shell).',
      '7. ADD a blockquote with a strong opinion or quote-worthy line.',
      '8. Voice: first-person Khaled Ahmed - senior full stack web dev, Cairo, 5+ years, 25+ projects across 7 countries. Practical, opinionated, no marketing fluff.',
      '9. End with a strong CTA paragraph linking to /contact.',
      '10. HTML allowed tags: p, h2, h3, h4, ul, ol, li, strong, em, code, pre, a, blockquote, div class="post-callout".',
      '11. Do NOT add inline style attributes or script/style tags.',
      '12. Do NOT use the string HTML on a line by itself.',
      '13. First paragraph must be p class="lead".',
      '',
      'Return JSON: slug, content_en (full expanded HTML).'
    ].join('\n')
    return agent(prompt, {
      label: 'expand-en:' + p.slug.slice(0, 30),
      phase: 'Expand EN content',
      schema: EN_SCHEMA,
      effort: 'high'
    })
  }
})

const expanded = (await parallel(enTasks)).filter(Boolean)
log('EN expansions: ' + expanded.length + '/' + POSTS_DATA.length)

phase('Translate to Arabic')
const arTasks = expanded.map(function(e) {
  return function() {
    const prompt = [
      'Translate this English blog post to natural, fluent Arabic.',
      '',
      'slug: ' + e.slug,
      '',
      'ENGLISH CONTENT (HTML - translate text, preserve all HTML tags exactly):',
      '---',
      e.content_en,
      '---',
      '',
      'REQUIREMENTS:',
      '1. Final Arabic word count: 2000-2800 words (strict minimum 2000).',
      '2. Preserve every HTML tag and attribute exactly: p, h2, h3, ul, ol, li, strong, em, code, pre, a, blockquote, div class="post-callout", p class="lead".',
      '3. Preserve every a href URL exactly. Translate only the anchor text.',
      '4. Code inside pre/code stays as-is.',
      '5. Tech terms (Laravel, React, Node.js, AWS, Stripe, API, MVP, SaaS) stay in Latin script.',
      '6. Voice: first-person Khaled Ahmed - senior full stack dev, Cairo, 5+ years, 25+ projects. Egyptian-leaning fus7a, practical, opinionated. Natural Arabic, not literal MT.',
      '7. Do NOT use the string HTML on a line by itself.',
      '8. Do NOT add inline style attributes.',
      '9. End with a CTA link to /contact.',
      '',
      'Return JSON: slug, content_ar (full Arabic HTML).'
    ].join('\n')
    return agent(prompt, {
      label: 'translate-ar:' + e.slug.slice(0, 30),
      phase: 'Translate to Arabic',
      schema: AR_SCHEMA,
      effort: 'high'
    })
  }
})

const translated = (await parallel(arTasks)).filter(Boolean)
log('AR translations: ' + translated.length + '/' + expanded.length)

phase('Verify both languages')
const verdicts = await parallel(expanded.map(function(e, i) {
  return function() {
    const t = translated.find(function(x) { return x.slug === e.slug })
    if (!t) return Promise.resolve({ pass: false, en_words: 0, ar_words: 0, issues: ['no AR translation'] })
    return agent(
      'Verify EN and AR expansions for slug: ' + e.slug +
      '\n\nEN first 4k chars:\n' + e.content_en.slice(0, 4000) +
      '\n\nAR first 4k chars:\n' + t.content_ar.slice(0, 4000) +
      '\n\nFull EN length chars: ' + e.content_en.length + '\nFull AR length chars: ' + t.content_ar.length +
      '\n\nCHECKS:\n1. EN stripped word count >= 1900.\n2. AR stripped word count >= 1900.\n3. Both have >= 4 h2 headings.\n4. Both have >= 5 internal links to /-prefixed URLs.\n5. Both have /contact CTA near end.\n6. Neither contains placeholder phrase.\n7. Neither contains HTML on a line by itself.\n\nReturn pass (true only if all good), en_words (int), ar_words (int), issues (array).',
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
const failed = final.filter(function(f) { return !f.pass || !f.content_ar })

log('Verified passed: ' + passed.length + '/' + final.length)

return {
  posts: passed.map(function(f) { return { slug: f.slug, content_en: f.content_en, content_ar: f.content_ar } }),
  failed: failed.map(function(f) { return { slug: f.slug, issues: f.issues, has_ar: !!f.content_ar, en_words: f.en_words, ar_words: f.ar_words } }),
  summary: { total: POSTS_DATA.length, expanded: expanded.length, translated: translated.length, passed: passed.length }
}
'''

# Replace placeholders with actual JSON
SCRIPT = SCRIPT.replace("__POSTS_JSON__", json.dumps(data, ensure_ascii=False))
SCRIPT = SCRIPT.replace("__SLUGS_JSON__", json.dumps(ALL_SLUGS))

out_path = "C:/Users/KHALE/.claude/projects/F--Certificates-khaled/084e325f-5145-43cd-b865-8e31357b8706/workflows/scripts/expand-blog-posts.js"
open(out_path, "w", encoding="utf-8").write(SCRIPT)
print(f"Wrote {len(SCRIPT):,} bytes -> {out_path}")
