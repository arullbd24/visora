<?php

namespace App\Livewire\Guest\Contact;

use Livewire\Attributes;
use Livewire\Component;

class FAQs extends Component
{
    #[Attributes\Layout('guest.layouts.main')]
    public function render()
    {
        return view('livewire.guest.contact.faqs');
    }
}
