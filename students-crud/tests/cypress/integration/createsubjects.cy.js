describe('Create Subject', ()=>{

    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min) + min); // The maximum is exclusive and the minimum is inclusive
      }
    
    it("create subject", () => {

        cy.visit("/courses/create");
        var nu = getRandomInt(1, 100)

        cy.get('input#name').type('Course'+nu)
        cy.get('input#code').type('Course/'+nu)
       
        cy.get('button#create_subj').click()
        
      });

});