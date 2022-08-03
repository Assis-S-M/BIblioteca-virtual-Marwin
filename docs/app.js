const Express = require("express");
const app = Express();
const Handlebars = require("express-handlebars");
const BodyParser = require("body-parser");
const Routes = require("./routes/routes.js")

app.engine('handlebars', Handlebars.engine({defaultLayout: 'main'}));
app.set('view engine', 'handlebars');
app.use(BodyParser.urlencoded({extended: false}));
app.use(Express.json());

app.use(Express.static(`${__dirname}/public`))

app.use("/", Routes)

app.listen(8080, () => {
    console.log("O servidor está rodando na url http://localhost:8080")
})
