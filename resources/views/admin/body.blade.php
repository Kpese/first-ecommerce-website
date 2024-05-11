<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ $product }}</h3>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success ">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Products</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ $customer }}</h3>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Customers</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ $total_order }}</h3>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-danger">
                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Orders</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ $revenue }}</h3>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success ">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Revenue</h6>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Transaction History</h4>
            <canvas id="transaction-history" class="transaction-chart"></canvas>
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1">Transfer to Paypal</h6>
                <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <h6 class="font-weight-bold mb-0">$236</h6>
              </div>
            </div>
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1">Tranfer to Stripe</h6>
                <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <h6 class="font-weight-bold mb-0">$593</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title mb-1">Open Projects</h4>
              <p class="text-muted mb-1">Your data status</p>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="preview-list">
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-primary">
                        <i class="mdi mdi-file-document"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">Admin dashboard design</h6>
                        <p class="text-muted mb-0">Broadcast web app mockup</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">15 minutes ago</p>
                        <p class="text-muted mb-0">30 tasks, 5 issues </p>
                      </div>
                    </div>
                  </div>
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-cloud-download"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">Wordpress Development</h6>
                        <p class="text-muted mb-0">Upload new design</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">1 hour ago</p>
                        <p class="text-muted mb-0">23 tasks, 5 issues </p>
                      </div>
                    </div>
                  </div>
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="mdi mdi-clock"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">Project meeting</h6>
                        <p class="text-muted mb-0">New project discussion</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">35 minutes ago</p>
                        <p class="text-muted mb-0">15 tasks, 2 issues</p>
                      </div>
                    </div>
                  </div>
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-danger">
                        <i class="mdi mdi-email-open"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">Broadcast Mail</h6>
                        <p class="text-muted mb-0">Sent release details to team</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">55 minutes ago</p>
                        <p class="text-muted mb-0">35 tasks, 7 issues </p>
                      </div>
                    </div>
                  </div>
                  <div class="preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="mdi mdi-chart-pie"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">UI Design</h6>
                        <p class="text-muted mb-0">New application planning</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">50 minutes ago</p>
                        <p class="text-muted mb-0">27 tasks, 4 issues </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>--}}
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Processing Order Status</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                        </label>
                                    </div>
                                </th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Customer Email</th>
                                <th scope="col">Customer Address</th>
                                <th scope="col">Customer Phone</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Delivery Status</th>
                                <th scope="col">Created Time</th>
                                <th scope="col">Delivered</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order as $item)
                                <tr>
                                    <td class="P-2"> {{ $item->customer_name }}</td>
                                    <td>{{ $item->customer_email}}</td>
                                    <td>{{ $item->customer_address}}</td>
                                    <td>{{ $item->customer_phone}}</td>
                                   <td>
                                     @if (!empty($item->product_image))
                                        <img src="{{ asset('images/products/'.$item->product_image) }}" style="width: 50px; height:50px" alt="">
                                    @endif
                                    </td>
                                    <td>{{ $item->product_title}}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity}}</td>
                                    <td>
                                    @if($item->delivery_status === 'Delivered')
                                    <p class="text-success">paid</p>
                                    @else
                                        {{ $item->payment_status }}
                                    @endif
                                    </td>
                                    <td>{{ $item->delivery_status }}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                     <td>
                                        @if($item->delivery_status === 'Delivered')
                                        <p class="text-success">delivered</p>
                                        @else
                                         <a href="{{ route('delivered', $item->id) }}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary btn-sm">Deliver</a>
                                        @endif
                                        </td>
                                  </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">Record not found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
