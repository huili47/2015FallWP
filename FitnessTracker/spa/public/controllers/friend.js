        angular.module('app')
        .controller('friend', function($http, alert, panel){       
            var self = this;

            self.template = "views/friend-index.html";            
            $http.get("/friend")
            .success(function(data){
                self.rows = data;
            });

            self.create = function(){
                self.rows.push({ isEditing: true });
            }
            self.edit = function(row, index){
                row.isEditing = true;
            }
            self.save = function(row, index){
                $http.post('/friend', row)
                .success(function(data){
                    data.isEditing = false;
                    self.rows[index] = data;
                }).error(function(data){
                    alert.show(data.code);
                });
            }
            self.delete = function(row, index){
                panel.show( {
                    title: "Delete a friend",
                    body: "Are you sure you want to delete " + row.friendname + "?",
                    confirm: function(){
                        $http.delete('/friend/' + row.friends_id)
                        .success(function(data){
                            self.rows.splice(index, 1);
                        }).error(function(data){
                            alert.show(data.code);
                        });
                    }
                });
            }
            
        })