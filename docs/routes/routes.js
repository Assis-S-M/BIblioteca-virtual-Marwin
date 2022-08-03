const Express = require('express')
const router = Express();
const SQModules = require("../Modules/DBConexão.js");

router.get("/", (req, res) => {
    res.render('home')
})

router.get("/addLivro", (req, res) => {
    res.render("addLivro");
})

router.get("/viewLivros", (req, res) => {
    SQModules.Livros.findAll({
        order: [
            ['id', 'ASC']
        ]
    }).then((livros) => {
        res.render("viewLivros", {livros: livros})
    })
})

router.post("/modificarLivro", (req, res) => {
    if (req.body.acao == "deletar") {
        res.render("deletar");
    } else if (req.body.acao == "data") {
        res.render("data")
    } else if (req.body.acao == "situacao") {
        res.render("situacao")
    } else if (req.body.acao == "alunoPos") {
        res.render("alunoPos")
    }
})

router.post("/add", (req, res) => {
    SQModules.Livros.create({
        'nome do livro': req.body.nomeLivro,
        'nome do autor': req.body.nomeAutor,
        'editora': req.body.editora,
        'data de devolucao': req.body.dataDevolução,
        'situacao atual': req.body.situação,
        'aluno possuinte': req.body.alunoPos
    })

    res.redirect("/addLivro")
})

router.post("/alter", (req, res) => {
    if (req.body.tipoAlteração == "alunoPos") {
        SQModules.Livros.update(
            {'aluno possuinte': req.body.novoNome},
            {where: {'id': req.body.id}})

    } else if (req.body.tipoAlteração == "situaçãoAtual") {
        SQModules.Livros.update(
            {'situacao atual': req.body.situaçãoAtual},
            {where: {'id': req.body.id}})

    } else if (req.body.tipoAlteração == "data") {
        SQModules.Livros.update(
            {'data de devolucao': req.body.dataDevolução},
            {where: {'id': req.body.id}})

    } else if (req.body.tipoAlteração == "apagarRegistro") {
        SQModules.Livros.destroy(
            {where: {'id': req.body.id}})

            console.log("teste")
    }

    res.redirect("/viewLivros")
})

module.exports = router;
