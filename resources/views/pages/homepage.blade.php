<x-layouts.app>

    <x-slot:introduction_text>
        <div class="introduction-text">
            <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
            <p>{{ __('introduction_texts.homepage_line_2') }}</p>
            <p>{{ __('introduction_texts.homepage_line_3') }}</p>
        </div>
    </x-slot:introduction_text>

    <!-- Letter Navigation -->
    <div class="letter-navigation">
        <h3>Ga naar letter:</h3>
        <div class="letter-links">
            <?php
            // Generate all available letters from the brands
            $available_letters = [];
            foreach($brands as $brand) {
                $letter = strtoupper(substr($brand->name, 0, 1));
                if (!in_array($letter, $available_letters)) {
                    $available_letters[] = $letter;
                }
            }
            sort($available_letters);
            
            // Generate A-Z navigation with available letters highlighted
            $alphabet = range('A', 'Z');
            foreach($alphabet as $index => $letter) {
                if (in_array($letter, $available_letters)) {
                    echo '<a href="#letter-' . $letter . '">' . $letter . '</a>';
                } else {
                    echo '<span class="letter-unavailable" style="color: rgba(255,255,255,0.3); padding: 0.5rem 0.8rem;">' . $letter . '</span>';
                }
                
                // Add dash separator between all letters except the last one
                if ($index < 25) {
                    echo '<span class="separator">-</span>';
                }
            }
            ?>
        </div>
    </div>

    <div class="brands-container">
        <h1>
            <x-slot:title>
                {{ __('misc.all_brands') }}
            </x-slot:title>
        </h1>

        <?php
        $size = count($brands);
        $columns = 3;
        $chunk_size = ceil($size / $columns);
        ?>

        <div class="row">
            @foreach($brands->chunk($chunk_size) as $chunk)
                <div class="col-md-4">
                    <div class="brand-column">
                        <ul>
                            @foreach($chunk as $brand)
                                <?php
                                $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                                if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                    echo '</ul>
                                    <h2 id="letter-' . $current_first_letter . '">' . $current_first_letter . '</h2>
                                    <ul>';
                                }
                                $header_first_letter = $current_first_letter
                                ?>

                                <li>
                                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <?php
                unset($header_first_letter);
                ?>
            @endforeach
        </div>
    </div>

</x-layouts.app>
