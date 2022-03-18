<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="row">
    
        @foreach ($activeplans as $item)

        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="widget-stat card @php 
            $plan=getProductDetails($item->product_id, 'name');

            switch ($plan) {
            case 'Popular Plan $100':
                print 'bg-success';
                break;

            case 'Classic Plan $200':
                print 'bg-success';
                break;
            
            case 'Silver Plan $500': 
                print 'bg-success';
                
                break; 

            case 'Gold Plan $1000':
                print 'bg-success';
                break; 
            
            case 'Diamond Plan $2000': 
                print 'bg-success';
                break; 
            
            case 'Platinum Plan $5000': 
                print 'bg-success';
                break;

            default:
                # code...
                break;
        }

            
            @endphp">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="
                            @php
                            //flaticon-381-star
                            $plan=getProductDetails($item->product_id, 'name');

                        switch ($plan) {
                        case 'Popular Plan $100':
                            print 'flaticon-381-heart';
                            break;

                        case 'Classic Plan $200':
                            print 'flaticon-381-star';
                            break;

                        case 'Silver Plan $500': 
                            print 'flaticon-381-layer-1';
                            
                            break; 

                        case 'Gold Plan $1000':
                            print 'flaticon-381-magnet';
                            break; 

                        case 'Diamond Plan $2000': 
                            print 'flaticon-381-diamond';
                            break; 

                        case 'Platinum Plan $5000': 
                            print 'flaticon-381-briefcase';
                            break;

                        default:
                            # code...
                            break;
                        }
                                                    

                            @endphp
                            
                            "></i>


                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">{{getProductDetails($item->product_id, 'name')}}</p>
                            <h3 class="text-white"> <span class="mb-1" style="font-weight: normal; font-size:14px;"> Expected Turnover: </span> ${{number_format(getPayoutAmount($item->product_id)*2)}}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-white text-center"> Status : Active </div>
            </div>
        </div>

        {{--  --}}
        @endforeach

    </div>
</div>
