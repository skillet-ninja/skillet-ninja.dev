{{-- Modal Body --}}

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        
        <h2>Edit</h2>

@yield('form-start')

        <div class="row">

            {{-- Amount Input --}}
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="amount">Amount</label>
                   
                    @yield ('amount-input')

                </div><!-- .form-group -->
            </div><!-- .col-sm-3 -->

            <div class="col-sm-5">
                <div class="form-group">
                    <label for="ingredient">Ingredient</label>
                    
                    @yield ('ingredient-input')

                </div><!-- .form-group -->
            </div><!-- .col-sm-5 -->
            
        </div> <!-- .row -->


{{-- Modal Footer --}}

<div class="modal-footer">

    {{-- Buttons --}}

    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-default customButtonStyle">Save</button>
        </div>

</form>  <!-- form  -->

        <div class="col-md-4">

            @yield('delete-button')

        </div>
        
        <div class="col-md-4">
            <button type="button" class="btn btn-default customButtonStyle" data-dismiss="modal">Cancel</button>
        </div>
    </div> <!-- .row -->
            <p></p>

    </div> <!-- .modal-footer -->
    </div> <!-- .col-sm-8 col-sm-offset-2-->
</div> <!-- .row -->