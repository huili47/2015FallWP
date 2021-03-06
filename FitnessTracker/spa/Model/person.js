var mysql = require("mysql");

module.exports =  {
    blank: function(){ return {} },
    get: function(id, ret, searchType){
        var conn = GetConnection();
        var sql = 'SELECT P.* FROM Persons P';
        if(id){
          switch (searchType) {
            case 'facebook':
              sql += " WHERE P.fbid = " + id;
              break;
            
            default:
              sql += " WHERE P.persons_id = " + id;
          }
          
        }
        conn.query(sql, function(err,rows){
          ret(err,rows);
          conn.end();
        });        
    },
    delete: function(id, ret){
        var conn = GetConnection();
        conn.query("DELETE FROM Persons WHERE persons_id = " + id, function(err,rows){
          ret(err);
          conn.end();
        });        
    },
    save: function(row, ret){
        var sql;
        var conn = GetConnection();
        //  TODO Sanitize
        if (row.id) 
        {
				  sql = " Update Persons P "                
							+ " Set firstname=?, lastname=? "
						  + " WHERE P.persons_id=? ";
			  }else
			  {
				  sql = "INSERT INTO Persons "                     
						  + " (firstname, lastname, created_at, fbid, typeid)"  
						  + "VALUES (?, ?, now(), ?, 'User')";			 
			  }

        conn.query(sql, [row.firstname, row.lastname, row.fbid, row.typeid, row.id],function(err,data){
          if(!err && !row.id){
            row.id = data.insertId;
          }
          ret(err, row);
          conn.end();
        });        
    },
    validate: function(row){
      var errors = {};
      
      if(!row.Name) errors.Name = "is required"; 
      
      return errors.length ? errors : false;
    }
};  

    function GetConnection(){
            var conn = mysql.createConnection({
              host: "localhost",
              user: "huili47",
              password: " ",
              database: "c9"
            });
        return conn;
    }