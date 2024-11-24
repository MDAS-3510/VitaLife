$('.flagFavoritoContato').click(function (event) {
event.preventDefault();
var $this = $(this);
$this.css("cursor", "wait");

var idContato = $this.prop("id");
var titulo = $this.prop("title");

if (titulo === "Favorito") {
      $this.html('<i class="bi bi-star"></i>').prop("title", "Não Favorito");
      $.getJSON('./paginas/contatos/contatos.php?idContato=' + idContato + '&flagFavoritoContato=0', function () {
         $this.css("cursor", "pointer");
      });
} else {
      $this.html('<i class="bi bi-star-fill"></i>').prop("title", "Favorito");
      $.getJSON('./paginas/contatos/contatos.php?idContato=' + idContato + '&flagFavoritoContato=1', function () {
         $this.css("cursor", "pointer");
      });
}
});
