
@include('admin.header')
@include('admin.navbar')
<!-- Content wrapper start -->
					<div class="content-wrapper">
	<!-- Row start -->
	<div class="row gx-3">
							<div class="col-sm-4 col-12">
								<div class="card card-cover rounded-2">
									<div class="contact-card">
									@if($userProfile->user_status==="0")
									<a href="{{route('verify_user',$userProfile->id)}}" class="edit-contact-card btn btn-success" >
											<i class="bi bi-pencil">Unfreezed</i>
										</a>
									@elseif($userProfile->user_status==="1")
									<a href="#" class="edit-contact-card btn btn-danger" data-bs-toggle="modal" data-bs-target="#editContact">
											<i class="bi bi-pencil">Freezed</i>
										</a>
									@endif
										
										<img src="{{ asset('uploads/display/' . ($userProfile->display_picture ? $userProfile->display_picture : 'avatar.jpg')) }}" alt="Joyce Admin" class="contact-avatar" />
										<h5>{{$userProfile->first_name}} {{$userProfile->last_name}}</</h5>
										<ul class="list-group">
											<li class="list-group-item">
												<span>Email: </span>{{$userProfile->email}}
											</li>
											<li class="list-group-item">
												<span>Account Number: </span>{{$userProfile->a_number}}
											</li>
											<li class="list-group-item">
												<span>Phone: </span>{{$userProfile->phone_number}}
											</li>
											<li class="list-group-item">
												<span>Country: </span>{{$userProfile->country}}
											</li>
											<li class="list-group-item">
												<span>TAC Code: </span>{{$userProfile->otp}}
											</li>
											 <li class="list-group-item">
												<span>Account Status: </span>@if($userProfile->user_status==="0")Unfreezed
													
												@elseif($userProfile->user_status==="1")Freezed
														@endif		
											</li> 
											<li class="list-group-item">
												<span>Money Launduring: </span>@if($userProfile->user_activity==="0") Deactived
													
												@elseif($userProfile->user_activity==="1")Actived
														@endif		
											</li> 
											<!--<li class="list-group-item">-->
											<!--	<span>ssn: </span>{{$userProfile->ssn}}-->
											<!--</li>-->

											<li class="list-group-item">
												<span>Loan Eligibilty Amount: </span>{{$userProfile->eligible_loan}}
											</li>
											<li class="list-group-item">
												<span>Account Balance: </span>{{$userProfile->currency}}{{number_format($balance, 2)}}
											</li>
											
										</ul>
									</div>
								</div>
							</div>

						</div>




							<div class="col-xxl-12">
								<!-- Card start -->
								<div class="card m-2">
									<div class="card-body">
										<!-- Modal XL -->
										<button type="button" class="btn btn-success" data-bs-toggle="modal"
											data-bs-target="#exampleModalCenter">
											Credit
										</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleModalCenter" tabindex="-1"
											aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">
														Credit {{$userProfile->first_name}} {{$userProfile->last_name}} 
														</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
										<form  action="{{route('credit.user')}}" method="POST">
                                              @csrf
													<div class="modal-body">
													<label class="form-label">Amount</label>
													<input type="hidden" name="email" value="{{$userProfile->email}}"/>
													<input type="hidden" name="name" value="{{$userProfile->first_name}} {{$userProfile->last_name}}"/>
													<input type="hidden" name="id" value="{{$userProfile->id}}"/>
													<input type="hidden" name="balance" value="{{$balance}}"/>
													<input type="hidden" name="a_number" value="{{$userProfile->a_number}}"/>
													<input type="hidden" name="currency" value="{{$userProfile->currency}}"/>
													<input type="number" step="0.0000000001"  name="amount" class="form-control" style="color:blue" placeholder="Enter Amount ({{$userProfile->currency}})" />
													<div class="m-0">
											         <label class="form-label">Description</label>
											         <textarea name="description" class="form-control" rows="3"></textarea>
										             </div>

                                                    </div>
													<div class="modal-footer">
												
														<button type="submit" class="btn btn-success">
															Credit
														</button>
													</div>
                                                </form>
												</div>
											</div>
										</div>




																				<!-- Modal XL -->
									<button type="button" class="btn btn-danger" data-bs-toggle="modal"
											data-bs-target="#exampleModalCenter2">
											Debit 
										</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleModalCenter2" tabindex="-1"
											aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">
														Debit {{$userProfile->first_name}} {{$userProfile->last_name}} 
														</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form  action="{{route('debit.user')}}" method="POST">
                                                       @csrf
													<div class="modal-body">
													<input type="hidden" name="email" value="{{$userProfile->email}}"/>
													<input type="hidden" name="name" value="{{$userProfile->first_name}} {{$userProfile->last_name}}"/>
													<input type="hidden" name="id" value="{{$userProfile->id}}"/>
													<input type="hidden" name="balance" value="{{$balance}}"/>
													<input type="hidden" name="a_number" value="{{$userProfile->a_number}}"/>
													<input type="hidden" name="currency" value="{{$userProfile->currency}}"/>
													<label class="form-label">Amount</label>
													<input type="number" step="0.0000000001"  name="amount" class="form-control" style="color:blue" placeholder="Enter Amount ({{$userProfile->currency}})" />
													<div class="m-0">
											         <label class="form-label">Description</label>
											         <textarea name="description" class="form-control" rows="3"></textarea>
										             </div>

                                                    </div>
													<div class="modal-footer">
													
														<button type="submit" class="btn btn-danger">
															Debit
														</button>
													</div>
													</form>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								<!-- Card end -->
							</div>

                        

							
							<div class="col-xxl-12">
								<!-- Card start -->
								<div class="card m-2">
									<div class="card-body">
										<!-- Modal XL -->
										<a href="{{route('verify_user',$userProfile->id)}}" class="edit-contact-card btn btn-success" >
										<button type="button" class="btn btn-success" >
											Freeze
										</button>
										</a>
							<a href="{{route('unfreeze_user',$userProfile->id)}}" class="edit-contact-card btn btn-danger" >
							<button type="button" class="btn btn-danger" >
							Unfreeze
						</button>
							</a>
									</div>
								</div>
							</div>

							<div class="col-xxl-12">
								<!-- Card start -->
								<div class="card m-2">
									<div class="card-body">
										<!-- Modal XL -->
										<a href="{{route('user_activity',$userProfile->id)}}" class="edit-contact-card btn btn-success" >
										<button type="button" class="btn btn-success" >
												Activate Money Laundering 
										</button>
										</a>
							<a href="{{route('iuser_activity',$userProfile->id)}}" class="edit-contact-card btn btn-danger" >
							<button type="button" class="btn btn-danger" >
								Deactivate Money Laundering 
						</button>
							</a>
									</div>
								</div>
							</div>



							<div class="col-xxl-12">
								<!-- Card start -->
								<div class="card m-2">
									<div class="card-body">
										<!-- Modal XL -->
										<button type="button" class="btn btn-success" data-bs-toggle="modal"
											data-bs-target="#exampleModalCenter3">
											Update Loan Eligibilty Amount
										</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleModalCenter3" tabindex="-1"
											aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">
														Update {{$userProfile->first_name}} {{$userProfile->last_name}} Loan Eligible Amount
														</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
										<form  action="{{route('update.eligible',$userProfile->id)}}" method="POST">
                                              @csrf
													<div class="modal-body">
													<label class="form-label">Loan Eligible Amount</label>
													<input type="hidden" name="id" value="{{$userProfile->id}}"/>
													<input type="number" name="eligible_loan" class="form-control" style="color:blue" placeholder="{{$userProfile->eligible_loan}}" />
												

                                                    </div>
													<div class="modal-footer">
												
														<button type="submit" class="btn btn-success">
															Update Loan Eligible Amount
														</button>
													</div>
                                                </form>
												</div>
											</div>
										</div>


										<button type="button" class="btn btn-success" data-bs-toggle="modal"
										data-bs-target="#exampleModalCenter9">
										Update TAC Code
									</button>
									<!-- Modal -->
									<div class="modal fade" id="exampleModalCenter9" tabindex="-1"
										aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">
													Update {{$userProfile->first_name}} {{$userProfile->last_name}} Loan Eligible Amount
													</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form  action="{{route('update.otp',$userProfile->id)}}" method="POST">
													@csrf
												<div class="modal-body">
												<label class="form-label">TAC Code</label>
												<input type="hidden" name="id" value="{{$userProfile->id}}"/>
												<input type="number" name="otp" class="form-control" style="color:blue" placeholder="{{$userProfile->otp}}" />
											

												</div>
												<div class="modal-footer">
											
													<button type="submit" class="btn btn-success">
														Update TAC Code
													</button>
												</div>
											</form>
											</div>
										</div>
									</div>

									
										
									</div>
								</div>
								<!-- Card end -->
							</div>





							<div class="row gx-3">
								<div class="col-sm-12 col-12">
									<!-- Card start -->
									<div class="card">
										<div class="card-header">
											<div class="card-title">Deposit History</div>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="highlightRowColum" class="table custom-table">
													<thead>
														<tr>
															<th>Transaction ID</th>
															<th>Amount</th>	
															<th>Deposit Type</th>
															<th>Check Proof</th>
															<th>Status</th>
															<th>Date</th>
															<th>Approve</th>
															<th>Decline</th>
				
														</tr>
													</thead>
													<tbody>
				
														@foreach($userdeposits as $deposit)
														<tr>
															<td>{{$deposit->id}}</td>
															<td>${{number_format($deposit->amount, 2)}}
															</td>
															<td>{{$deposit->deposit_type}}</td>
															<td> <img src="{{asset('uploads/cheque/'.$deposit->front_cheque)}}" width="30%"></td>
				                                           
															<td>
																@if ($deposit->status == '1')
																<span class="badge shade-light-green">Completed</span>
																@elseif($deposit->status == '0')
																<span class="badge shade-light-red">Pending</span>
																@elseif($deposit->status == '2')
																<span class="badge shade-light-red">Declined</span>
																@endif
															</td>
															<td>{{ \Carbon\Carbon::parse($deposit->created_at)->format('D, M j, Y g:i
																A') }}
															</td>
															<td>
																<form action="{{url('approve-deposit/'.$deposit->id)}}">
																	@csrf
																	<input type="hidden" name="status" value="1">
																	<input type="hidden" name="user_id" value="{{$userProfile->id}}">
																	<input type="hidden" name="email" value="{{$userProfile->email}}">
																	<input type="hidden" name="amount" value="{{$deposit->amount}}">
																	<input type="hidden" name="deposit_type" value="{{$deposit->deposit_type}}">
																	<button type="submit" class="badge shade-blue">Approve</button>
																</form>
				
				
															</td>
															<td>
																<form action="{{url('decline-deposit/'.$deposit->id)}}">
																	@csrf
																	<input type="hidden" name="status" value="2">
																	<input type="hidden" name="user_id" value="{{$userProfile->id}}">
																	<input type="hidden" name="email" value="{{$userProfile->email}}">
																	<input type="hidden" name="amount" value="{{$deposit->amount}}">
																	<input type="hidden" name="deposit_type" value="{{$deposit->deposit_type}}">
																	<button type="submit" class="badge shade-red">Decline</button>
																</form>
															</td>
														</tr>
														@endforeach
				
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- Card end -->





									<div class="row gx-3">
										<div class="col-sm-12 col-12">
											<!-- Card start -->
											<div class="card">
												<div class="card-header">
													<div class="card-title">KYC Details</div>
												</div>
												<div class="card-body">
													<div class="table-responsive">
														<table id="highlightRowColumn" class="table custom-table">
															<thead>
																<tr>
																	<th>Id Card Front</th>
																	<th>Back</th>
																	<th>Status</th>
																	<th>Date</th>
						
																</tr>
															</thead>
															<tbody>
						
															
																<tr>
						
																	<td> <img src="{{asset('uploads/kyc/'.$userProfile->id_card)}}" width="30%">
																	</td>
						
						
																	<td> <img src="{{asset('uploads/kyc/'.$userProfile->passport)}}" width="30%">
																	</td>
						
																	@if($userProfile->kyc_status=='0')
																	<td>pending</td>
																	@elseif($userProfile->kyc_status=='1')
																	<td>approved</td>
																	@elseif($userProfile->kyc_status=='2')
																	<td>Declined</td>
																	@endif
																	<td>{{$userProfile->created_at}}</td>
						
																	<td>
																		<form action="{{url('accept-kyc/'.$userProfile->id)}}">
																			@csrf
																			<input type="hidden" name="status" value="1">
																			<button type="submit" class="btn btn-primary me-2"
																				href="">Approve</button>
																		</form>
						
																		<br>
																		<form action="{{url('decline-kyc/'.$userProfile->id)}}">
																			@csrf
																			<input type="hidden" name="status" value="0">
																			<button type="submit" class="btn btn-danger"
																				href="">Decline</button>
																		</form>
																	</td>
																</tr>
															
															</tbody>
														</table>
													</div>
												</div>
											</div>








							<div class="row gx-3">
								<div class="col-sm-12 col-12">
									<!-- Card start -->
									<div class="card">
										<div class="card-header">
											<div class="card-title">Loan History</div>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table id="highlightRowColum" class="table custom-table">
													<thead>
														<tr>
															<th>Transaction ID</th>
															<th>Amount</th>	
															<th>Reason</th>
															<th>License Proof</th>
															<th>PhotoID Proof</th>
															<th>Selfie Proof</th>
															<th>SSN</th>
															<th>Credit Score</th>
															<th>Status</th>
															<th>Date</th>
															<th>Approve</th>
															<th>Decline</th>
				
														</tr>
													</thead>
													<tbody>
				
														@foreach($loan as $loan)
														<tr>
															<td>{{$loan->id}}</td>
															<td>${{number_format($loan->amount, 2)}}
															</td>
															<td>{{$loan->reason}}</td>
															<td> <img src="{{asset('uploads/loan/'.$loan->license)}}" width="30%"></td>
				                                            <td> <img src="{{asset('uploads/loan/'.$loan->photoID)}}" width="30%"></td>
															<td> <img src="{{asset('uploads/loan/'.$loan->selfie)}}" width="30%"></td>
															<td>{{$loan->ssn}}</td>
															<td>{{$loan->credit_score}}</td>
															<td>
																@if ($loan->status == '1')
																<span class="badge shade-light-green">Completed</span>
																@elseif($loan->status == '0')
																<span class="badge shade-light-red">Pending</span>
																@elseif($loan->status == '2')
																<span class="badge shade-light-red">Declined</span>
																@endif
															</td>
															<td>{{ \Carbon\Carbon::parse($loan->created_at)->format('D, M j, Y g:i
																A') }}
															</td>
															<td>
																<form action="{{url('approve-loan/'.$loan->id)}}">
																	@csrf
																	<input type="hidden" name="status" value="1">
																	<input type="hidden" name="user_id" value="{{$userProfile->id}}">
																	<input type="hidden" name="email" value="{{$userProfile->email}}">
																	<input type="hidden" name="amount" value="{{$loan->amount}}">
																	<input type="hidden" name="reason" value="{{$loan->reason}}">
																	<button type="submit" class="badge shade-blue">Approve</button>
																</form>
				
				
															</td>
															<td>
																<form action="{{url('decline-loan/'.$loan->id)}}">
																	@csrf
																	<input type="hidden" name="status" value="2">
																	<input type="hidden" name="user_id" value="{{$userProfile->id}}">
																	<input type="hidden" name="email" value="{{$userProfile->email}}">
																	<input type="hidden" name="amount" value="{{$loan->amount}}">
																	<input type="hidden" name="reason" value="{{$loan->reason}}">
																	<button type="submit" class="badge shade-red">Decline</button>
																</form>
															</td>
														</tr>
														@endforeach
				
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- Card end -->


									<div class="row gx-3">
										<div class="col-sm-12 col-12">
											<!-- Card start -->
											<div class="card">
												<div class="card-header">
													<div class="card-title">Card Request</div>
												</div>
												<div class="card-body">
													<div class="table-responsive">
														<table id="highlightRowColum" class="table custom-table">
															<thead>
																<tr>
																	<th>Card No</th>
																	<th>Card CVC</th>	
																	<th>Status</th>
																	<th>Date</th>
																	<th>Approve</th>
																	<th>Decline</th>
						
																</tr>
															</thead>
															<tbody>
						
																@foreach($usercards as $cards)
																<tr>
																	
																	
																	<td>{{$cards->card_number}}</td>
																	<td>{{$cards->card_cvc}}</td>
															
																	<td>
																		@if ($cards->status == '1')
																		<span class="badge shade-light-green">Completed</span>
																		@elseif($cards->status == '0')
																		<span class="badge shade-light-red">Pending</span>
																		@elseif($cards->status == '2')
																		<span class="badge shade-light-red">Declined</span>
																		@endif
																	</td>
																	<td>{{ \Carbon\Carbon::parse($cards->created_at)->format('D, M j, Y g:i
																		A') }}
																	</td>
																	<td>
																		<form action="{{url('approve-card/'.$cards->id)}}">
																			@csrf
																			<input type="hidden" name="status" value="1">
																			<input type="hidden" name="user_id" value="{{$userProfile->id}}">
																			<input type="hidden" name="email" value="{{$userProfile->email}}">
																			<input type="hidden" name="amount" value="{{$cards->amount}}">
																	       <input type="hidden" name="card_number" value="{{$cards->card_number}}">
																			<button type="submit" class="badge shade-blue">Approve</button>
																		</form>
						
						
																	</td>
																	<td>
																		<form action="{{url('decline-card/'.$cards->id)}}">
																			@csrf
																			<input type="hidden" name="status" value="2">
																			<input type="hidden" name="user_id" value="{{$userProfile->id}}">
																			<input type="hidden" name="email" value="{{$userProfile->email}}">
																			<input type="hidden" name="amount" value="{{$cards->amount}}">
																	       <input type="hidden" name="card_number" value="{{$cards->card_number}}">
																			<button type="submit" class="badge shade-red">Decline</button>
																		</form>
																	</td>
																</tr>
																@endforeach
						
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<!-- Card end -->

















				
							<div class="row gx-3">
							<div class="col-sm-12 col-12">
								<!-- Card start -->
								<div class="card">
									<div class="card-header">
										<div class="card-title">Transaction History</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="highlightRowColumn" class="table custom-table">
												<thead>
													<tr>
														<th>Transaction ID</th>
														<th>Transaction Type</th>
														<th>Description</th>
														<th>Amount</th>
														<th>Status</th>
														<th>Date</th>
														
													</tr>
												</thead>
												<tbody>
												
												@foreach($user_transactions as $transaction)
												<tr>
												
												<td>{{$transaction->transaction_ref}}</td>
												<td>{{$transaction->transaction_type}}</td>
												<td>{{$transaction->transaction_description}}</td>
												<td>{{$userProfile->currency}}{{number_format($transaction->transaction_amount, 2)}}</td>
												<td>
												@if ($transaction->transaction_status == '1')
												<span class="badge shade-light-green">Completed</span>
												@elseif($transaction->transaction_status == '0')
												<span class="badge shade-light-red">Pending</span>
												@elseif($transaction->transaction_status == '2')
												<span class="badge shade-light-red">Failed</span>
												@endif
											    </td>
											   <td> <form action="{{ url('update-transaction-date/' . $transaction->id) }}">
                                                 @csrf
                                           <input type="datetime-local" id="new_date" name="new_date" value="{{$transaction->created_at}}">
                                 <button type="submit">Update Date</button>
                                               </form>
                                              </td>
												<!--<td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('D, M j, Y g:i A') }}</td>-->
												<td>
													<form action="{{url('approve-transaction/'.$transaction->id)}}">
														@csrf
														<input type="hidden" name="transaction_status" value="1">
														<input type="hidden" name="user_id" value="{{ $transaction->user_id }}">
													
											     	<button type="submit" class="badge shade-blue">Approve</button>
													</form>
	
	
												</td>
												<td>
													<form action="{{url('decline-transaction/'.$transaction->id)}}">
														@csrf
														<input type="hidden" name="transaction_status" value="2">
														<input type="hidden" name="user_id" value="{{$transaction->user_id}}">
														<input type="hidden" name="email" value="{{$transaction->email}}">
														<input type="hidden" name="amount" value="{{$transaction->amount}}">
														
														<button type="submit" class="badge shade-red">Decline</button>
													</form>
												</td>
										
												</tr>
												@endforeach
											
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Card end -->

						

						
								<!-- Card end -->

								<!-- Card end -->
							</div>
						</div>
				
						</div>
				<!-- Content wrapper scroll end -->

				

				@include('admin.footer')