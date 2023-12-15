<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        // Get distinct categories
        $categories = Faq::distinct('category')->pluck('category');
    
        // Filter FAQs by category
        $faqs = Faq::when($request->category, function ($q) use ($request) {
            return $q->where('category', $request->category);
        })->get();
    
        return view('faq.index', ['faqs' => $faqs, 'categories' => $categories]);
    }
    public function updateFAQs(Request $request)
    {
        $faqIds = $request->input('faq_ids');
        $updatedFAQs = $request->input('updatedFAQs');
    
        // Check if $updatedFAQs is an array before proceeding
        if (is_array($faqIds) && is_array($updatedFAQs)) {
            foreach ($faqIds as $faqId) {
                $faq = Faq::find($faqId);
    
                if ($faq) {
                    $updateData = $updatedFAQs[$faqId] ?? [];
    
                    // Check if user is authenticated before accessing user attributes
                    if (auth()->check() && auth()->user()->is_admin) {
                        $faq->update([
                            'question' => $updateData['question'] ?? $faq->question,
                            'answer' => $updateData['answer'] ?? $faq->answer,
                            'category' => $updateData['category'] ?? $faq->category,
                        ]);
                    }
                }
            }
    
            return redirect()->back()->with('success', 'FAQs updated successfully');
        }
    
        // Handle the case where $updatedFAQs or $faqIds is not an array
        return redirect()->back()->with('error', 'Invalid data received for FAQs update');
    }
}
