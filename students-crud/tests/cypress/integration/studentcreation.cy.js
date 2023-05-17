describe('Create Student', ()=>{
    
    it("create student", () => {

        cy.visit("/students/create");

        cy.get('input#first_name').type('Adam')
        cy.get('input#last_name').type('Testing')
        cy.get('input#reg_no').type('reg001')
        cy.get('button#create_std').click()

        
        
      });

});