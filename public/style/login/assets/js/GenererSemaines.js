document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("submitBtn").addEventListener("click", function() {
        const dateDebut = document.getElementById("dateDebut").value;
        const dateFin = document.getElementById("dateFin").value;
        const weeks = semainesCreation(dateDebut, dateFin);
        const resultContainer = document.getElementById("resultContainer");
        resultContainer.innerHTML = ""; 
        weeks.forEach(function(week) {
            const weekDiv = document.createElement("div");
            weekDiv.textContent = week.semaine + ": " + week.dateDebut.toLocaleDateString() + " - " + week.dateFin.toLocaleDateString();
            resultContainer.appendChild(weekDiv);
        });
    });

    function semainesCreation(dd, df) {
        let dateDebut = new Date(dd);
        dateDebut.setDate(dateDebut.getDate() + 1)
        let dateFin = new Date(df);

        let incr = 0;
        const semainesTab = [];
        
        while (dateDebut <= dateFin) {
            let jourDD = dateDebut.getDay();

            let dateFinOfWeek = new Date(dateDebut.getTime());

            switch (jourDD) {
                case 1:
                    dateFinOfWeek.setDate(dateDebut.getDate() + 5);
                    break;
                case 2:
                    dateFinOfWeek.setDate(dateDebut.getDate() + 4);
                    break;
                case 3:
                    dateFinOfWeek.setDate(dateDebut.getDate() + 3);
                    break;
                case 4:
                    dateFinOfWeek.setDate(dateDebut.getDate() + 2);
                    break;
                case 5:
                    dateFinOfWeek.setDate(dateDebut.getDate() + 1);
                    break;
                case 6:
                    // Saturday
                    break;
                default:
                    dateFinOfWeek.setDate(dateDebut.getDate() + 1);
                    break;
            }

            semainesTab.push({
                semaine: 'S' + String(incr + 1),
                dateDebut: new Date(dateDebut.getTime()),
                dateFin: new Date(dateFinOfWeek.getTime()), // Create new Date object
            });

            dateDebut = new Date(dateFinOfWeek.getTime()); // Update dateDebut with a new Date object
            dateDebut.setDate(dateDebut.getDate() + 2); // Increment by 2 days
            incr++;
        }

        console.log(semainesTab);
        return semainesTab
    }
    
});
