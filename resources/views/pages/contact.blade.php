<x-layouts.app>

    <x-slot:head>
        <meta name="description" content="Neem contact op met 4S Handleidingen - Wij helpen u graag bij het vinden van de juiste handleiding">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li>Contact</li>
    </x-slot:breadcrumb>

    <div class="contact-container">
        <h1>Contact</h1>
        
        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-8">
                <div class="contact-form-section">
                    <h3>Stuur ons een bericht</h3>
                    <p>Heeft u vragen over handleidingen of kunt u niet vinden wat u zoekt? Neem dan contact met ons op via onderstaand formulier.</p>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.submit') }}" class="contact-form">
                        @csrf
                        
                        <div class="form-group">
                            <label for="name">Naam *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">E-mailadres *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subject">Onderwerp *</label>
                            <select class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" required>
                                <option value="">Kies een onderwerp</option>
                                <option value="Handleiding zoeken" {{ old('subject') == 'Handleiding zoeken' ? 'selected' : '' }}>Handleiding zoeken</option>
                                <option value="Handleiding toevoegen" {{ old('subject') == 'Handleiding toevoegen' ? 'selected' : '' }}>Handleiding toevoegen</option>
                                <option value="Website probleem" {{ old('subject') == 'Website probleem' ? 'selected' : '' }}>Website probleem</option>
                                <option value="Algemene vraag" {{ old('subject') == 'Algemene vraag' ? 'selected' : '' }}>Algemene vraag</option>
                                <option value="Anders" {{ old('subject') == 'Anders' ? 'selected' : '' }}>Anders</option>
                            </select>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Bericht *</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="6" required 
                                      placeholder="Beschrijf uw vraag of probleem zo duidelijk mogelijk...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('privacy') is-invalid @enderror" 
                                       id="privacy" name="privacy" {{ old('privacy') ? 'checked' : '' }} required>
                                <label class="form-check-label" for="privacy">
                                    Ik ga akkoord met het <a href="/privacy" target="_blank">privacybeleid</a> *
                                </label>
                                @error('privacy')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane"></i> Bericht versturen
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4">
                <div class="contact-info-section">
                    <h3>Contactgegevens</h3>
                    
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>E-mail</strong><br>
                            <a href="mailto:info@4s-handleidingen.nl">info@4s-handleidingen.nl</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Telefoon</strong><br>
                            <a href="tel:+31612345678">06 123 4567</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Adres</strong><br>
                            Voorbeeldstraat 123<br>
                            1234 AB Amsterdam<br>
                            Nederland
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>Openingstijden</strong><br>
                            Maandag - Vrijdag: 09:00 - 17:00<br>
                            Weekend: Gesloten
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-reply-all"></i>
                        <div>
                            <strong>Reactietijd</strong><br>
                            Wij reageren binnen 24 uur op uw bericht
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
