{{-- Modal Body --}}

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        
        <h2>Ingredient</h2>

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
        </form>  <!-- form  -->
                <div class="col-sm-6">
                <div class="pull-left">
                    @yield('delete-button')
                </div>

                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-default customButtonStyle" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success customButtonStyle">Save</button>
                </div>
            </div> <!-- .row -->

        </div> <!-- .modal-footer -->
    </div> <!-- .col-sm-8 col-sm-offset-2-->
</div> <!-- .row -->
