describe('Removing student course', ()=>{
    
    it("Remove Student courses", () => {
   
        cy.visit("/students");
        
        /* 
          The first is the home anchor, the second is the create
          To get the first list of students use the thirst anchor .eq(2)
        */
        cy.get('a').eq(2)
        .click()


        cy.get('a').eq(4)
        .click()

      });
  
  });