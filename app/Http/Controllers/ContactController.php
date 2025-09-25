<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ContactController extends Controller
{
    /**
     * Show the contact form
     */
    public function show()
    {
        return view('pages.contact');
    }

    /**
     * Handle the contact form submission
     */
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'privacy' => 'required|accepted'
        ], [
            'name.required' => 'Naam is verplicht',
            'name.max' => 'Naam mag maximaal 255 karakters bevatten',
            'email.required' => 'E-mailadres is verplicht',
            'email.email' => 'E-mailadres moet geldig zijn',
            'email.max' => 'E-mailadres mag maximaal 255 karakters bevatten',
            'subject.required' => 'Onderwerp is verplicht',
            'subject.max' => 'Onderwerp mag maximaal 255 karakters bevatten',
            'message.required' => 'Bericht is verplicht',
            'message.max' => 'Bericht mag maximaal 2000 karakters bevatten',
            'privacy.required' => 'U moet akkoord gaan met het privacybeleid',
            'privacy.accepted' => 'U moet akkoord gaan met het privacybeleid'
        ]);

        // Create the message content
        $messageContent = $this->formatContactMessage($validated);

        // Save to text file
        $this->saveContactMessage($messageContent);

        // Redirect back with success message
        return redirect()->route('contact.show')->with('success', 
            'Bedankt voor uw bericht! Wij nemen binnen 24 uur contact met u op.'
        );
    }

    /**
     * Format the contact message for storage
     */
    private function formatContactMessage(array $data): string
    {
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
        
        return "=== NIEUW CONTACTBERICHT ===\n" .
               "Datum/Tijd: {$timestamp}\n" .
               "Naam: {$data['name']}\n" .
               "E-mail: {$data['email']}\n" .
               "Onderwerp: {$data['subject']}\n" .
               "IP Adres: " . request()->ip() . "\n" .
               "User Agent: " . request()->userAgent() . "\n" .
               "---\n" .
               "Bericht:\n" .
               "{$data['message']}\n" .
               "=== EINDE BERICHT ===\n\n";
    }

    /**
     * Save the contact message to a text file
     */
    private function saveContactMessage(string $message): void
    {
        $filename = 'contact-messages-' . Carbon::now()->format('Y-m') . '.txt';
        
        // Ensure the directory exists
        if (!Storage::exists('contact')) {
            Storage::makeDirectory('contact');
        }
        
        // Append the message to the file
        Storage::append('contact/' . $filename, $message);
    }
}
