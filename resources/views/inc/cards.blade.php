

<!-- Carousel -->
<section class="carousel">
    <div class="reel">

        
        

           
<?php
 use App\medecin;   $medecins =medecin::all(); 
 use App\image;    


 
 ?>

 

@if(count($medecins) > 0)

@foreach ($medecins as $med) 

<?php $spec = DB::table('specialites')->where('ID_specialite', $med->ID_specialite)->first();?>
<?php  $img=image::where('ID_image',$med->ID_image)->first(); ?>
        <article>
        <a href="#" class="image featured"><img style="height: 300px;" src="/storage/images/{{$img->image}}"  /></a>
            <header>
            <h3><a href="#">{{$med->Nom}} {{$med->Prenom}}</a></h3>
            </header>
            <p>Telephone : {{$med->Telephone}}</p>
            <p>Spécialité : {{$spec->specialite}}</p>
            <p>
        </article>

@endforeach



@else <h1>no doctors founds</h1>
@endif

</div>
</section>






