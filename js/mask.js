<input type="text" id="campoData">
<input type="text" id="campoTelefone">
<input type="text" id="campoSenha">
 
<script>
jQuery(function($){
$("#campoData").mask("99/99/9999");
$("#campoTelefone").mask("(999) 999-9999");
$("#campoSenha").mask("***-****");
});
</script>