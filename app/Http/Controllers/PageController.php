<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function blogs()
    {
        return view('pages.blogs');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function faqs()
    {
        return view('pages.faqs');
    }

    public function gallery()
    {
        return view('pages.gallery');
    }

    public function teams()
    {
        return view('pages.teams');
    }

    public function portfolios()
    {
        return view('pages.portfolios');
    }

    public function portfolioCategory($category)
    {
        return view('pages.portfolios', compact('category'));
    }

    public function portfolioShow($slug)
    {
        // Portfolio data
        $portfolios = [
            'business-card' => [
                'title' => 'Business Card',
                'category' => 'UI/UX',
                'slug' => 'business-card',
                'date' => '18 March 2024',
                'value' => '$150',
                'customer' => 'ElseColor',
                'created_date' => '20 December 2024',
                'end_date' => '28 December 2024',
                'description' => '<p><span style="color:rgb(109,112,119);font-family:Roboto, sans-serif;font-size:16px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>',
                'images' => ['1710766686-portfolio_single_01.jpg', '1710766690-portfolio_single_02.jpg'],
            ],
            'paper-design' => [
                'title' => 'Paper Design',
                'category' => 'Creative',
                'slug' => 'paper-design',
                'date' => '18 March 2024',
                'description' => '<p>Creative paper design project with modern aesthetics.</p>',
                'images' => ['1710766610-portfolio-img-5.jpg'],
            ],
            'square-box' => [
                'title' => 'Square Box',
                'category' => 'Mockup',
                'slug' => 'square-box',
                'date' => '18 March 2024',
                'description' => '<p>Square box mockup design project.</p>',
                'images' => ['1710766597-portfolio-img-4.jpg'],
            ],
            'coffee-mockup' => [
                'title' => 'Coffee Mockup',
                'category' => 'Mockup',
                'slug' => 'coffee-mockup',
                'date' => '18 March 2024',
                'description' => '<p>Coffee mockup design project.</p>',
                'images' => ['no-image.jpg'],
            ],
            'mockup-box' => [
                'title' => 'Mockup Box',
                'category' => 'Mockup',
                'slug' => 'mockup-box',
                'date' => '18 March 2024',
                'description' => '<p>Mockup box design project.</p>',
                'images' => ['1710766555-portfolio-grid-img-2.jpg'],
            ],
            'card-mockup' => [
                'title' => 'Card Mockup',
                'category' => 'Creative',
                'slug' => 'card-mockup',
                'date' => '18 March 2024',
                'description' => '<p>Card mockup design project.</p>',
                'images' => ['1710766541-portfolio-grid-img-1.jpg'],
            ],
        ];

        $portfolio = $portfolios[$slug] ?? [
            'title' => 'Portfolio Item',
            'category' => 'Category',
            'slug' => $slug,
            'date' => '18 March 2024',
            'description' => '<p>Portfolio item description.</p>',
            'images' => ['no-image.jpg'],
        ];

        return view('pages.portfolio-detail', compact('portfolio'));
    }

    public function plans()
    {
        return view('pages.plans');
    }

    public function careers()
    {
        return view('pages.careers');
    }
}

