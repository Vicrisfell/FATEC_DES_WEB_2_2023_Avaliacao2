<?php 

$candidato = new Candidato("", "", "");
$candidatoDAO = new CandidatoDAO();
$candidatoDAO->insert($candidato);
$candidatoDAO = new CandidatoDAO();
$candidatos = $candidatoDAO->getAll();
foreach ($candidatos as $candidato) {
echo $candidato->getId() . " - " . $candidato->getNome() . " - " . $candidato->getEmail() . "<br>";}
$candidatoDAO = new CandidatoDAO();
$candidato = $candidatoDAO->getById(1);
$candidato->setNome(");
$candidato->setEmail("");
$candidatoDAO->update($candidato);
$candidatoDAO = new CandidatoDAO();
$candidato = $candidatoDAO->getById(1);
$candidatoDAO->delete($candidato);

?>