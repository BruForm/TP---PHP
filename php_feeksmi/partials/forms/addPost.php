<!-- Formulaire d'ajout de nouveaux articles -->

<!-- Le traitement se fait sur la même page donc on met le "/" pour rediriger sur l'index -->
<form action="/" method="POST" xmlns:button="http://www.w3.org/1999/html">
    <label for="title">Titre de l'article</label>
    <input id="title" type="text" name="title">

    <label for="content">content</label>
    <textarea id="content" name="content" cols="30" rows="10"></textarea>
    <button type="submit">Créer</button>
</form>
