<footer class="">



</footer>

<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/infinite-scroll.pkgd.min.js"></script>
<script src="/js/markdown.js"></script>
<script src="/js/to-markdown.js"></script>
<script src="/js/bootstrap-markdown.js"></script>
<script src="locale/bootstrap-markdown.fr.js"></script>


<script type="text/javascript">

// jQuery
if ( $('.pagination__next').length ) {

  $('.load').infiniteScroll({

    path: '.pagination__next',
    append: '.question-type-normal',
    history: false,

  });

}


$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('#myTabs a[href="#post"]').tab('show') // Select tab by name
$('#myTabs a[href="#comment"]').tab('show') // Select tab by name

</script>
