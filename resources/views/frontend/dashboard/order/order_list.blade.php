@extends('frontend.dashboard.dashboard')
@section('dashboard')
    @php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
    @endphp
    <section class="section pt-4 pb-4 osahan-account-page">
        <div class="container">
            <div class="row">
                @include('frontend.dashboard.sidebar')
                <div class="col-md-9">
                    <div class="osahan-account-page-right rounded shadow-sm bg-white p-4 h-100">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <h4 class="font-weight-bold mt-0 mb-4">Order List</h4>
                                <div class="bg-white card mb-4 order-list shadow-sm">
                                    <div class="gold-members p-4">

                                        <table class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Date</th>
                                                    <th>Invoice</th>

                                                    <th>Amount</th>
                                                    <th>Payment</th>

                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($allUserOrder as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->order_date }}</td>

                                                        <td>{{ $item->invoice_no }}</td>
                                                        <td>$ {{ $item->amount }}</td>
                                                        <td>{{ $item->payment_method }}</td>

                                                        <td>
                                                            @if($item->status == 'Pending')
                                                                <span class="badge bg-info p-2">Pending</span>
                                                            @elseif($item->status == 'confirm')
                                                                <span class="badge bg-primary p-2">Confirm</span>
                                                            @elseif($item->status == 'processing')
                                                                <span class="badge bg-warning p-2">Processing</span>
                                                            @elseif($item->status == 'deliverd')
                                                                <span class="badge bg-success p-2">Deliverd</span>
                                                            @endif
                                                        </td>

                                                        <td class="d-flex justify-between text-center">
                                                            <a href="{{ route('user.order.details', $item->id) }}"
                                                                class="btn-sm d-block text-info">
                                                                <i class="fas fa-eye rounded-3"></i> View
                                                            </a>

                                                            <a href="{{ route('user.invoice.download', $item->id) }}"
                                                                class="btn-sm d-block text-danger ml-2">
                                                                <i class="fa fa-download rounded-3"></i> Invoice
                                                            </a>
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
                </div>
            </div>
        </div>
    </section>

@endsection()
