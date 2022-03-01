<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registered Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-lg mb-0 table-striped">
                        <thead>
                            <tr>
                                <th class="">
                                    <div class="custom-control custom-checkbox mx-2">
                                        <input type="checkbox" class="custom-control-input" id="checkAll">
                                        <label class="custom-control-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                               
                                <th class="pl-5 width200">Linked Wallet
                                </th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="customers">
                            <tr class="btn-reveal-trigger">

                                @foreach ($users as $item)
                                    

                                <td>
                                    <div class="custom-control custom-checkbox mx-2">
                                        <input type="checkbox" class="custom-control-input" id="checkbox1">
                                        <label class="custom-control-label" for="checkbox1"></label>
                                    </div>
                                </td>
                                <td class="py-3">
                                    <a href="#">
                                        <div class="media d-flex align-items-center">
                                            <div class="avatar avatar-xl mr-2">
                                                <div class=""><img class="rounded-circle img-fluid" src="/storage/{{$item->profile_photo_path}}" width="30" alt="">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mb-0 fs--1">{{$item->name}}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="py-2"><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>

                                <td class="py-2 pl-5 wspace-no">{{getWallet($item->id)}}</td>
                                <td class="py-2">{{$item->created_at}}</td>
                                <td class="py-2 text-right">
                                    <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-toggle="dropdown"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                        <div class="dropdown-menu dropdown-menu-right border py-0">
                                            <div class="py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                                </td>
                              
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>
        </div>
    </div>




</div>
