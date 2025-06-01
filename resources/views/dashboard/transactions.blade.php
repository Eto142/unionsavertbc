@include('dashboard.header')
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
                
                <h4 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">Transaction History</h4>
                				<div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
					
					
                       
                            
                                    
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($transaction as $details)
                                                        <tr>
                                                            <td>
                                                                @if($details->transaction == 'Bank Transfer')
                                                                <div class="withdraw-icon bg-success">&#128179;</div>
                                                                @elseif($details->transaction == 'Loan')
                                                                <div class="withdraw-icon bg-dark">&#128176;</div>
                                                                @elseif($details->transaction == 'Card')
                                                                <div class="withdraw-icon bg-dark">&#128179;</div>
                                                                @elseif($details->transaction == 'Crypto Withdrawal')
                                                                <div class="withdraw-icon bg-warning">&#129421;</div>
                                                                @elseif($details->transaction == 'Paypal Withdrawal')
                                                                <div class="withdraw-icon bg-info">&#128184;</div>
                                                                @elseif($details->transaction == 'Skrill Withdrawal')
                                                                <div class="withdraw-icon bg-success">&#128176;</div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="text-black">{{$details->transaction_description}} <br> 
                                                                {{$details->created_at}}</span>
                                                            </td>
                                                            <td>
                                                                <span class="text-black font-w500">
                                                                    @if($details->transaction == 'Bank Transfer')-
                                                                    @elseif($details->transaction == 'Loan')+
                                                                    @elseif($details->transaction == 'Paypal Withdrawal')-
                                                                    @elseif($details->transaction == 'Skrill Withdrawal')-
                                                                    @elseif($details->transaction == 'Crypto Withdrawal')-
                                                                    @endif 
                                                                    {{Auth::user()->currency}}
                                                                    {{number_format($details->transaction_amount, 2, '.', ',')}}
                                                                    <br>
                                                                    @if($details->transaction_status == '1')
                                                                    <a href="javascript:void(0)" class='badge light badge-success'>Successful</a>
                                                                    @elseif($details->transaction_status == '0')
                                                                    <a href="javascript:void(0)" class='badge light badge-primary'>Pending</a>
                                                                    @else
                                                                    <a href="javascript:void(0)" class='badge light badge-warning'>Failed</a>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                    </div>
                                </div>
                  
				
            </div>
        </div>
@include('dashboard.footer')
