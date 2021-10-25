<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-responsive-md">
                
                <thead>
                    <tr>
                        
                        <th style="width:60%">Name</th>
                        <th style="width:25%">Date</th>
                        <th style="width:15%">Referral Code</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                             
                        <td>{{$item->name}}</td>
                           
                        <td>{{$item->created_at}}</td>
                        <td><span class='badge light badge-success'>{{$item->affiliate_id}}</span></td>
                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p style="text-align: center"><i> You have a total number of {{referrals('count')}} referrals. Invite more to earn more! </i></p>

            {{$list->links()}}
        </div>
    </div>

</div>
