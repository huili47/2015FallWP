var mysql = require("mysql");

module.exports =  {
    GetConnection: function(){
        var conn = mysql.createConnection({
          host: "localhost",
          user: "huili47",
          password: "",
          database: "c9"
        });
    return conn;
}
};