@include('dashboard.header')


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        
        
        
        
      <style>
  .container {
    width: 80%;
    margin: 20px auto;
    padding: 10px;
    border-radius: 10px;
    background-color: rgba(240, 240, 240, 0.8); /* Transparent background color */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .marquee-container {
    overflow: hidden;
    border-radius: 10px;
  }

  .marquee {
    color: white;
    background-color: rgba(48, 92, 137, 0.8); /* Transparent background color */
    font-weight: bold;
    padding: 10px;
    border-radius: 10px;
  }
</style>
        
        
        
        
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="form-head mb-4">
                    <h5 class="text-black font-w600 mb-0">Overview</h5>
                </div>
               <div class="col-sm-12">
                   {{-- <div class="marquee-container">
    <marquee class="marquee" behavior="scroll" direction="left" scrollamount="5">
      If traditional withdrawal methods are not meeting your needs or if you're looking for a more convenient and secure way to access your funds, virtual card withdrawals are the way to go. They offer instant accessibility, security, convenience, global accessibility, budgeting control, and contribute to environmental sustainability. Embrace the future of finance with virtual cards!
    </marquee>
  </div> --}}


    <div class="card" style="background-color: #305C89;">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                
                <p style="color: white; margin-bottom: 0.5rem;">TOTAL BALANCE<span class="text-danger"></span></p>
                <div class="balance-container">
                    <h6 id="visibleBalance" class="fw-bold text-white" style="font-size: 1.25rem;">
                        {{ Auth::user()->currency }}{{ number_format($balance, 2) }}
                    </h6>
                    <h6 id="hiddenBalance" class="fw-bold text-white hidden-balance d-none" style="font-size: 1.25rem;">
                        ********
                    </h6>
                </div>
            </div>
            <div class="form-check form-switch d-flex align-items-center">
                <input class="form-check-input m-0 me-2" type="checkbox" id="balanceToggle">
                <label class="form-check-label text-white mb-0" for="balanceToggle" style="padding-left: 15px"></label>
            </div>
        </div>
    </div>
</div>

                
                
                <style>
                    /* Custom styles for the switch button */
                    .form-check-input {
                        width: 40px;
                        height: 20px;
                        margin-left: 10px;
                    }
                
                    .form-check-input:checked + .form-check-label::before {
                        background-color: #28a745; /* Green color when switch is ON */
                    }
                
                    .form-check-label::before {
                        width: 38px;
                        height: 18px;
                    }
                </style>
                
                <script>
                    // JavaScript code remains the same
                </script>
                
                    <div class="d-flex justify-content-between">
                          
                    </div>
                     <h6 style="padding-left: 16px;"><span class="text-primary">{{Auth::user()->a_number}} - ACTIVE</span></h6>
                    <hr class="hr">

                    <div class="row">
             <div class="col-sm-12 col-lg-12">
               <div class="">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5><span class="text-black">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span></h5>
                        <br>
                        <h5 class="fw-bold text-black">
                            <span id="visibleBalance2">{{Auth::user()->currency}}{{number_format($balance, 2)}}</span>
                            <span id="hiddenBalance2" class="d-none">{{ str_repeat('*', strlen(number_format($balance, 2))) }}</span>
                        </h5>
                    </div>
                    <div class="form-check form-switch d-flex align-items-center">
                        <input class="form-check-input m-0 me-2" type="checkbox" id="balanceToggle2">
                        <label class="form-check-label text-black mb-0" for="balanceToggle2" style="padding-left: 35px">Hide Balance</label>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const balanceToggle2 = document.getElementById('balanceToggle2');
        const visibleBalance2 = document.getElementById('visibleBalance2');
        const hiddenBalance2 = document.getElementById('hiddenBalance2');

        balanceToggle2.addEventListener('change', function () {
            if (this.checked) {
                visibleBalance2.classList.add('d-none');
                hiddenBalance2.classList.remove('d-none');
            } else {
                visibleBalance2.classList.remove('d-none');
                hiddenBalance2.classList.add('d-none');
            }
        });
    });
</script>






                    <div class="balance-box">
        <div class="balance-box-content">
            <div class="balance-box-left">Ledger balance: {{ Auth::user()->currency }}{{ number_format($balance, 2) }} </div>
            <div class="balance-box-right"><a href='{{url('transactions')}}' style='color:white'><i class="fa fa-history"></i> History</a></div>
        </div>
    </div>
    
    <style>
.balance-box {
    background-color: #305C89;
    color: white;
    padding: 20px;
    border-radius: 8px;
    margin: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.balance-box-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.balance-box-left,
.balance-box-right {
    font-weight: bold;
}

.history-icon {
    margin-right: 5px;
}

/* Responsive Styling */
@media screen and (max-width: 768px) {
    .balance-box {
        padding: 15px;
        margin: 15px 0;
    }

    .balance-box-content {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .balance-box-left,
    .balance-box-right {
        margin-right: 10px;
        font-size: 0.8em; /* Adjust font size for smaller screens */
    }

    .balance-box-right a {
        font-size: 0.8em; /* Adjust font size for smaller screens */
        margin-left: auto; /* Move "History" link to the right end */
    }

    .history-icon {
        font-size: 1.3em; /* Adjust icon size for smaller screens */
    }
}

</style>
    
<div class="grid-container-two">
    <div class="d-block text-center">
        <div class="withdraw-icon bg-danger">
            <a href="{{route('bank')}}">&#128179;</a>
        </div>
        <a href="{{route('bank')}}" style='color:black'><span>Bank Transfer</span></a>
    </div>
    <div class="d-block text-center">
        <div class="withdraw-icon bg-warning">
            <a href="{{route('crypto')}}">&#129421;</a>
        </div>
        <a href="{{route('crypto')}}" style='color:black'><span>Crypto Withdrawal</span></a>
    </div>
    <div class="d-block text-center">
        <div class="withdraw-icon bg-info">
            <a href="{{route('paypal')}}">&#128184;</a>
        </div>
        <span><a href="{{route('paypal')}}" style='color:black'>Paypal Withdrawal</a></span>
    </div>
    <div class="d-block text-center">
        <div class="withdraw-icon bg-success">
            <a href="{{route('skrill')}}">&#128176;</a>
        </div>
        <span><a href="{{route('skrill')}}" style='color:black'>Skrill Withdrawal</a></span>
    </div>

    <div class="d-block text-center">
        <div class="withdraw-icon bg-succes">
            <a href="{{ route('deposit') }}">&#10003;</a>
        </div>
        <a href="{{ route('deposit') }}" style="color:black;">
            <span>Cheque Deposit</span>
        </a>
    </div>
    
    <div class="d-block text-center">
        <div class="withdraw-icon bg-secondary">
            <a href="">&#128184;</a>
        </div>
        <a href="" style='color:black'><span>Tax Payment</span></a>
    </div>
    <div class="d-block text-center">
        <div class="withdraw-icon bg-info">
            <a href="">&#128737;</a>
        </div>
        <span><a href="" style='color:black'>Insurance</a></span>
    </div>
    <div class="d-block text-center">
        <div class="withdraw-icon bg-dark">
            <a href="{{route('loan')}}">&#128176;</a>
        </div>
        <a href="{{route('loan')}}" style='color:black'><span>Loan</span></a>
    </div>
</div>


                   

                   

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body pb-1">
                                <div class="row align-items-center">
                                    <div class="col-xl-5 col-xxl-12 col-md-5">
                                        <h4 class="fs-20 text-black mb-4"></h4>
                                        <div class="row">

                                        </div>
                                    </div>
                                    
                                    <div id="bankCarousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="bank-advert1.jpg" class="d-block w-100" alt="Bank Advert 1">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="bank-advert2.jpg" class="d-block w-100" alt="Bank Advert 2">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="bank-advert3.jpg" class="d-block w-100" alt="Bank Advert 3">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#bankCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#bankCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    
                                            {{-- <div class="col-12">
                                                <div class="bg-info rounded text-center p-3">
                                                    <div class="d-inline-block position-relative donut-chart-sale mb-3">
                                                        <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0.2)"],   "innerRadius": 33, "radius": 10}'>0/100</span>
                                                      
                                                    </div>
                                                    <span class="fs-14 text-white d-block">Loans</span>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->


    @include('dashboard.footer')









<script>
    document.addEventListener('DOMContentLoaded', function () {
        const balanceToggle = document.getElementById('balanceToggle');
        const visibleBalance = document.getElementById('visibleBalance');
        const hiddenBalance = document.getElementById('hiddenBalance');

        balanceToggle.addEventListener('change', function () {
            if (this.checked) {
                visibleBalance.classList.add('d-none');
                hiddenBalance.classList.remove('d-none');
            } else {
                visibleBalance.classList.remove('d-none');
                hiddenBalance.classList.add('d-none');
            }
        });
    });
</script>

    