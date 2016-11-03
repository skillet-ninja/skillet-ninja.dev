<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        
        <h2>Step Input</h2>

@yield('form-start')

    <div class="row">

        {{-- Step Input --}}
        <div class="col-sm-10">
            <div class="form-group">
                <label for="step">Step</label>
                
                @yield('step-input')
                
            </div><!-- .form-group -->
        </div><!-- .col-sm-2 -->

        {{-- Timer Input --}}
        <div class="col-sm-2">
            <div class="form-group">
                <label for="time">Timer</label>
                
                @yield('timer-input')

            </div><!-- .form-group -->
        </div><!-- .col-sm-2 -->

    </div> <!-- .row -->

    <div class="row">

        {{-- Imgage URL Input --}}
        <div class="col-sm-6">
            <div class="form-group">
                <label for="image_url">Image Link</label>

                @yield('image-input')

            </div><!-- .form-group -->
        </div><!-- .col-sm-6 -->


        {{-- Video URL Input --}}
        <div class="col-sm-6">
            <div class="form-group">
                <label for="video_url">Video Link</label>
                
                @yield('video-input')

            </div><!-- .form-group -->
        </div><!-- .col-sm-6 -->

    </div> <!-- .row -->


        <div class="modal-footer">

            {{-- Buttons --}}

            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-success customButtonStyle" id="ingredient-submit">Save</button>
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
    </div> <!-- .col-sm-10 col-sm-offset-1 -->
</div> <!-- .row -->