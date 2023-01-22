@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <div class="min-h-screen">
        <div class="grid lg:grid-cols-2 justify-center">
            <!-- Content-->
            <div class="px-4 lg:px-[91px] pt-10">
                <!-- Logo Brand -->
                <a href="#" class="flex-shrink-0 inline-flex items-center">
                    <img class="h-10" src="{{ asset('assets/frontsite/images/logo4.png') }}" alt="BloodWeb Logo" />
                </a>
                <!--End Logo Brand -->

                <!--Form -->
                <div class="flex flex-col justify-center py-14 h-screen lg:min-h-screen">
                    <h2 class="text-[#363636] text-4xl font-semibold leading-normal">
                        BloodWeb <br />
                        Web Donor Darah
                    </h2>
                    <div class="mt-12">

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Form input -->
                        <form method="POST" action="{{ route('login') }}" class="grid gap-6">
                            @csrf
                            <label class="block">
                                <input type="email" id="email" name="email"
                                    class="block w-full rounded-full py-4 text-[#363636] font-medium placeholder:text-[#F8F8F8] placeholder:font-normal px-7 border border-[#D4D4D4] focus:outline-none focus:border-[#D70909]"
                                    placeholder="Email Address" value="{{ old('email') }}" required autofocus />
                                @if ($errors->has('email'))
                                    <p class="text-red-500 mb-3 text-sm">{{ $errors->first('email') }}</p>
                                @endif
                            </label>

                            <label class="block">
                                <input type="password" id="password" name="password"
                                    class="block w-full rounded-full py-4 text-[#363636] font-medium placeholder:text-[#F8F8F8] placeholder:font-normal px-7 border border-[#D4D4D4] focus:outline-none focus:border-[#D70909]"
                                    placeholder="Password" required />
                            </label>

                            <div class="mt-10 grid gap-6">
                                <button
                                    class="text-center text-white text-lg font-medium bg-[#D70909] px-10 py-4 rounded-full shadow">
                                    Login
                                </button>
                                <a href="{{ route('register') }}"
                                    class="text-center text-lg text-[#1E2B4F] font-medium bg-[#F2F6FE] px-10 py-4 rounded-full shadow">
                                    Register
                                </a>
                            </div>
                        </form>
                        <!--End Form input -->
                    </div>
                </div>
                <!--End Form -->
            </div>
            <!-- End Content -->

            <!-- Qoute -->
            <div class="hidden sm:block bg-[#F9FBFC]">
                <div class="flex flex-col justify-center h-full px-24 pt-10 pb-20">
                    <div class="relative">
                        <div class="relative top-0 -left-5 mb-7">
                            <img src="{{ asset('assets/frontsite/images/blockqoutation.svg') }}" class="h-[30px]"
                                alt="" />
                        </div>
                        <p class="text-2xl leading-loose">
                            BloodWeb telah membantu saya dalam proses birokrasi terkait donor darah maupun saat butuh darah yang
                            dibantu oleh petugas professional dan memberikan dampak yang sangat besar kepada
                            saya dan bagi yang membutuhkan
                        </p>
                        <div class="flex-shrink-0 group block mt-7">
                            <div class="flex items-center">
                                <div class="ring-1 ring-[#0D63F3] ring-offset-4 rounded-full">
                                    <img class="inline-block h-14 w-14 rounded-full"
                                        src="{{ asset('assets/frontsite/images/patient-testimonial.png') }}"
                                        alt="" />
                                </div>
                                <div class="ml-5">
                                    <p class="font-medium text-[#1E2B4F]">Shayna</p>
                                    <p class="text-sm text-[#F8F8F8]">Product Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Qoute -->
        </div>
    </div>

@endsection
