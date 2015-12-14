        angular.module('app')
        .controller('meal', function($http, alert, panel){       
            var self = this;

            self.template = "views/meal-index.html";            
            $http.get("/meal")
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
                $http.post('/meal', row)
                .success(function(data){
                    data.isEditing = false;
                    self.rows[index] = data;
                }).error(function(data){
                    alert.show(data.code);
                });
            }
            self.delete = function(row, index){
                panel.show( {
                    title: "Delete a meal",
                    body: "Are you sure you want to delete " + row.mealname + "?",
                    confirm: function(){
                        $http.delete('/food/' + row.meals_id)
                        .success(function(data){
                            self.rows.splice(index, 1);
                        }).error(function(data){
                            alert.show(data.code);
                        });
                    }
                });
            }
            
        })