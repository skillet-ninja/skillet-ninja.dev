
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary btn-primary btn-view-recipe" data-recipe={{ $recipe->id }}>View Recipe</button> --}}

<!-- Recipe Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Recipe</h4>
            </div>
            <div class="modal-body">
            
    
            <div class="title-rating">
                <h2 class="modal-name">{{ $recipe->name }}</h2>
            </div>

            <h4 class="modal-author">Submitted by <strong>{{ $recipe->user->name}}</strong></h4>

            <dl>
                <dt>Description</dt>
                <dd>{{ $recipe->summary }}</dd>
            </dl>

            <div class="row">
                <div class="col-md-3 rounded-list">
                    <h1>Ingredients</h1>
                    <ol>
                        @foreach ($recipe->ingredients as $ingredient)
                        <li><a href="#">{{ $ingredient->ingredient }}</a></li>
                        @endforeach
                    </ol>
                </div>


                <div class="col-md-8 rounded-list">
                    <h1>Steps</h1>
                    <ol>
                        @foreach ($recipe->steps as $step)
                            <li><a href="#">{{ $step->step }}</a></li>
                        @endforeach
                    </ol>
        
                </div>            
            </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">SKILLET!</button>
            </div>
        </div>
    </div>
</div>
    