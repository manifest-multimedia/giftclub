<!-- Add Order -->
<div class="modal fade" id="addOrderModalside">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Contract</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-black font-w500">Select Package</label>
                        <select class="form-control">
                            <option> $100 Plan </option>
                            <option> $200 Plan </option>
                            <option> $500 Plan </option>
                            <option> $1000 Plan </option>
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label class="text-black font-w500">Event Date</label>
                        <input type="date" class="form-control">
                    </div> --}}
                    <div class="form-group">
                        <label class="text-black font-w500">Password Confirmation</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <a href="{{route('pay', 1)}}" type="button" class="btn btn-primary">Add Contract</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>