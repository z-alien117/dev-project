<x-modal>
    @slot('title')
        Add Invoice
    @endslot
    @slot('content')
    <div id="basic">
        <form class="mb-0" id="DynamicForm" name="template-contactform" action="{{route('functions.store_invoice')}}" method="POST">
            @csrf
            <div class="form-process">
                <div class="css3-spinner">
                    <div class="css3-spinner-scaler"></div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-6 form-group">
                    <div class="white-section">
                        <label>Clients:</label>
                        <select class="selectpicker" id="client" name="client" data-live-search="true" title="Select Client">
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}" data-subtext="">{{$client->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 bottommargin-sm">
                    <label for="">Date &amp; Time Picker</label>
                    <div class="form-group">
                        <div class="input-group text-start" data-target-input="nearest" data-target=".datetimepicker">
                            <input type="text" id="date" name="date" class="form-control datetimepicker-input datetimepicker" data-target=".datetimepicker" placeholder="YYYY/MM/DD 00:00 AM/PM"/>
                            <div class="input-group-text" data-target=".datetimepicker" data-toggle="datetimepicker"><i class="icon-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="w-100"></div>

                <div class="col-12 form-group d-none">
                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                </div>
            </div>
            <input type="hidden" name="prefix" value="template-contactform-">
        </form>
    </div>
    <div id="product_data"></div>
    <div id="product_table"></div>

    @endslot
    @slot('footer')
    <div class="col-12 form-group">
        <button class="btn_save button button-3d button-rounded button-green"><i class="icon-save2"></i> Save</button>
        <button class="button button-3d button-rounded button-red"  data-bs-dismiss="modal"><i class="icon-thumbs-down21"></i> Cancel</button>
    </div>
    @endslot
</x-modal>