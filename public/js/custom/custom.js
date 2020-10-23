$(document).ready(function() {


        let favCount = $('#nav__fav-count').data('fav-count');


        $(document).on('click', '.movie__fav-icon', function() {

            let url = $(this).data('url');
            let movie_id = $(this).data('movie-id');
            let isFavored = $(this).hasClass('fw-900');

            toggleFavorite(url, isFavored, movie_id);


         }); //end of nav fav count



        $(document).on('click', '.movie__fav-btn', function(e) {

            e.preventDefault();

            let url = $(this).find('.movie__fav-icon').data('url');
            let movie_id = $(this).find('.movie__fav-icon').data('movie-id');
            let isFavored = $(this).find('.movie__fav-icon').hasClass('fw-900');

            toggleFavorite(url, isFavored, movie_id);


        }); //end of nav fav count






    function toggleFavorite(url, isFavored, movie_id) {

           (!isFavored) ? favCount++ : favCount--;
           (favCount > 9) ? $('#nav__fav-count').html('9+') : $('#nav__fav-count').html(favCount);

            $(".movie-" + movie_id).toggleClass('fw-900');


            if($('.movie-' + movie_id).closest('.favorite').length) {

                $('.movie-' + movie_id).closest('.movie').remove();
            }


        $.ajax({
               url: url,
               method: 'POST',
               success: function() {

               }
           });

       } //end of toggle favorite function

});
