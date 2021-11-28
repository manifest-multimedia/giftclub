<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    {{--  Add Order  --}}
    <x-validation-errors />
    <div class="modal fade" id="addOrderModalside" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Contract</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="process">
                        @csrf
                        <div class="form-group">
                            <label class="text-black font-w500">Select Package</label>
                            <select class="form-control" wire:model='product' wire:ignore>
                            @foreach ($products as $item)
                                <option value="{{$item->id}}" id="product"> {{$item->name}} </option>
                            @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="text-black font-w500">Password Confirmation</label>
                            <input type="password" class="form-control" wire:model="userPasswordConfirmation" wire:ignore>
                             
                        </div>
                        <div class="form-group">
                            <a href="" type="submit" class="btn btn-primary" wire:click="process">Add Contract</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
