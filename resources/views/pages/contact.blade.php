@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')

@endsection

@section('content')
    <section class="relative h-[400px] lg:h-[450px] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('/images/cta-bg.webp');">
            <!-- Enhanced overlay for better text readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
        </div>

        <!-- Content -->
        <div class="relative h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
                <div class="flex items-center h-full">
                    <div class="max-w-4xl">
                        <h1 class="text-white leading-tight mb-6 drop-shadow-lg"
                            style="font-family: Inter;
                               font-weight: 600;
                               font-size: 60px;
                               line-height: 72px;
                               letter-spacing: -0.02em;
                               width: 1476px;
                               max-width: 100%;">
                            About Favorite<br>
                            HR Services
                        </h1>
                        <p class="text-lg lg:text-xl text-white/95 leading-relaxed max-w-lg drop-shadow-md">
                            Empower your project with our comprehensive wireframe kits designed to meet the needs of any platform
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 lg:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="text-center mb-16">
                <h2 class="text-[#2A2D5A] mb-6 font-extrabold"
                    style="width: 473px;
           height: 60px;
           max-width: 100%;
           margin: 0 auto 1.5rem auto;
           font-size: 48px;
           line-height: 60px;
           font-weight: 1200;
           letter-spacing: -0.02em;">
                    For More Information
                </h2>
                <p class="text-lg text-gray-600">
                    Transforming human potential into sustainable business growth.
                </p>
            </div>

            <!-- Contact Information Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">

                <!-- Address Card -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="w-12 h-12 bg-[#2A2D5A] rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Address</h3>
                    <div class="text-gray-600 text-sm space-y-1">
                        <p>Alfa Plaza [Formerly Jangid Plaza]</p>
                        <p>6th Floor, Ada Estate/Oysterbay -</p>
                        <p>Off Ali Hassan Mwinyi Road</p>
                        <p>Dar Es Salaam, Tanzania</p>
                    </div>
                </div>

                <!-- Phone Card -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="w-12 h-12 bg-[#2A2D5A] rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Phone</h3>
                    <div class="text-gray-600 text-sm">
                        <p class="mb-2">Call us for assistance</p>
                        <p class="text-[#2A2D5A] font-medium">+255 683 383 132</p>
                        <p class="text-[#2A2D5A] font-medium">+255 767 636 871</p>
                        <p class="text-[#2A2D5A] font-medium">+255 710 287 676</p>
                        <p class="text-[#2A2D5A] font-medium">+255 750 048 993</p>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="w-12 h-12 bg-[#2A2D5A] rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Email</h3>
                    <div class="text-gray-600 text-sm">
                        <p class="mb-2">Send inquiries via email</p>
                        <p class="text-[#2A2D5A] font-medium">fhs@favoritegroup.co.tz</p>
                        <p class="text-[#2A2D5A] font-medium">jobs@favoritegroup.co.tz</p>
                    </div>
                </div>
            </div>

            <!-- Map and Contact Form -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Google Map Section -->
                <div class="rounded-lg overflow-hidden shadow-sm">
                    <iframe
                        width="100%"
                        height="500"
                        frameborder="0"
                        scrolling="no"
                        marginheight="0"
                        marginwidth="0"
                        id="gmap_canvas"
                        src="https://maps.google.com/maps?width=1920&amp;height=400&amp;hl=en&amp;q=Alfa%20Plaza%20Formerly%20Jangid%20Plaza%20Dar%20es%20Salaam+(Alfa%20Plaza%20Formerly%20Jangid%20Plaza)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        class="w-full h-96 lg:h-full">
                    </iframe>
                </div>

                <!-- Contact Form -->
                <div class="bg-white">
                    <form class="space-y-6">

                        <!-- Name Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First name</label>
                                <input type="text"
                                       id="first_name"
                                       name="first_name"
                                       placeholder="First name"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#2A2D5A] transition-colors text-sm">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last name</label>
                                <input type="text"
                                       id="last_name"
                                       name="last_name"
                                       placeholder="Last name"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#2A2D5A] transition-colors text-sm">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   placeholder="Enter your email"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#2A2D5A] transition-colors text-sm">
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone number</label>
                            <div class="flex">
                                <select class="px-3 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:border-[#2A2D5A] bg-white text-sm border-r-0">
                                    <option value="+255">TZ (+255)</option>
                                    <option value="+1">US (+1)</option>
                                    <option value="+44">UK (+44)</option>
                                </select>
                                <input type="tel"
                                       id="phone"
                                       name="phone"
                                       placeholder="Phone number"
                                       class="flex-1 px-4 py-3 border border-gray-300 rounded-r-lg focus:outline-none focus:border-[#2A2D5A] transition-colors text-sm">
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea id="message"
                                      name="message"
                                      rows="4"
                                      placeholder="Type your message here"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#2A2D5A] transition-colors resize-vertical text-sm"></textarea>
                        </div>

                        <!-- Helper Text -->
                        <div class="text-sm text-gray-500">
                            Helper text
                        </div>

                        <!-- Privacy Policy Checkbox -->
                        <div class="flex items-start">
                            <input type="checkbox"
                                   id="privacy_policy"
                                   name="privacy_policy"
                                   class="w-4 h-4 mt-0.5 rounded border-gray-300 text-[#2A2D5A] focus:ring-[#2A2D5A] focus:ring-2">
                            <label for="privacy_policy" class="ml-3 text-sm text-gray-600">
                                By reaching out to us, you agree to our
                                <a href="#" class="text-[#2A2D5A] hover:underline">Privacy Policy</a>.
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                                class="w-full bg-[#2A2D5A] text-white py-3 px-6 rounded-lg hover:bg-[#1f2347] transition-colors font-semibold text-sm">
                            Send message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>




{{--    @include('patrials.clients')--}}
@endsection

@section('footer')
    @include('patrials.footer')
@endsection
