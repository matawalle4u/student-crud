describe('Student listing', ()=>{
    
  it("lists students", () => {
 
      cy.visit("/students");
      /* 
        The first is the home anchor, the second is the create
        To get the first list of students use the thirst anchor .eq(2)
      */
      cy.get('a').eq(2)
      .click()

      cy.get('a#edit_std').click()

      /*
        will redirect to the student view page
        handle editing here
      */

        cy.get('input#first_name').type('Edited')
        cy.get('input#last_name').type('Adam')
        cy.get('input#reg_no').type('editedreg001')

        cy.get('button#edit_student').click()

        






      
     
      
      
      
    });

});