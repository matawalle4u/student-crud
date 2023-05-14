describe('Display List of students', ()=>{
    
    it("has anchor tags", () => {
        cy.visit("/");

        cy.contains("a", "students");
        cy.contains("a", "courses");
        

      });

});