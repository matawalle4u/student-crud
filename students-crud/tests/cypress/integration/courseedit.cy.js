describe('Courses listing', ()=>{

  function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min) + min); // The maximum is exclusive and the minimum is inclusive
  }
    
    it("Edits students", () => {
   
        cy.visit("/courses");
        /* 
          The first is the home anchor, the second is the create
          To get the first list of students use the thirst anchor .eq(2)
        */
        cy.get('a').eq(2)
        .click()

        cy.get('a#edit_course').click()
  
        cy.get('input#name').type('Edited'+getRandomInt(1,100))
        cy.get('input#code').type('edited'+getRandomInt(1,100))

        cy.get('button#update_btn').click()

      });
  
  });