<div>
    <!-- Hero Section -->
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated fadeInDown">Unsubscribe from Newsletter</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('welcome') }}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Unsubscribe</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .card {
            background: #ffffff;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
        }

        .btn-danger {
            background: #e63946;
            border: none;
            transition: all 0.3s ease-in-out;
        }
        .btn-danger:hover {
            background: #b71c1c;
            transform: scale(1.05);
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            transition: all 0.3s ease-in-out;
        }
        .btn-outline-secondary:hover {
            background: #040525;
            color: white;
            transform: scale(1.05);
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <!-- Unsubscribe Section -->
    <section class="unsubscribe_area section_gap">
        <div class="container text-center fade-in">
            <div class="card shadow-lg p-4 border-0 rounded-4 mx-auto" style="max-width: 500px;">
                <h3 class="fw-bold text-danger"><i class="fas fa-exclamation-triangle"></i> Unsubscribe</h3>
                <p class="text-muted">We’re sad to see you go! Are you sure you want to unsubscribe?</p>

                <!-- Success Message -->
                @if (session()->has('message'))
                    <div class="alert alert-success fade show" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if (session()->has('error'))
                    <div class="alert alert-danger fade show" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Unsubscribe Button -->
                <button wire:click="unsubscribe" class="btn btn-danger w-100 mt-3">
                    <i class="fas fa-times-circle"></i> Yes, Unsubscribe Me
                </button>

                <!-- Stay Subscribed Button -->
                <a href="{{ route('welcome') }}" class="btn btn-outline-secondary w-100 mt-2">
                    <i class="fas fa-arrow-left"></i> No, Keep Me Subscribed
                </a>
            </div>
        </div>
    </section>
</div>
