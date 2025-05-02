

<?php
$title = "Référentiel";
$css = "/assets/css/dashboard.css";

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <title>Document</title>
    
</head>
<body>
    

<main class="main-content">


<div class="premier">
     <div class="card">
         <div class="icon-container">
             <i class="fas fa-graduation-cap"></i>
         </div>
         <div class="card-content">
             <h1>180</h1>
             <p>Apprenants</p>
         </div>
     </div>
     <div class="card">
         <div class="icon-container">
             <i class="fas fa-folder"></i>
         </div>
         <div class="card-content">
             <h1>5</h1>
             <p>Référentiels</p>
         </div>
     </div>
     <div class="card">
         <div class="icon-container">
         <i class="fa-solid fa-cubes"></i>
     
        </div>
         <div class="card-content">
             <h1>5</h1>
             <p>Stagiaires</p>
         </div>
     </div>
     <div class="card">
         <div class="icon-container">
             <i class="fas fa-user-tie"></i>
         </div>
         <div class="card-content">
             <h1>13</h1>
             <p>Permanents</p>
         </div>
     </div>
 </div>

 <div class="deuxieme">
     <div class="c1">
         <img src="/assets/images/d.png"  alt="">

         <h4>Transformer la vie des personnes grace à nos solution <br> technologiques, innovantes et accessibles</h4>
         <div class="stat-container">
             <div class="stat-item">
             <h3>180</h3>
             <p>Apprenants</p>
             </div>
             
             <div class="trait"></div>
             <div class="stat-item">
             <h3>2025</h3>
             <p>Promotion</p>
             </div>
             <div class="trait"></div>

             <div class="stat-item">
             <h3>10</h3>
             <p>Mois</p>
             </div>
         </div>
     </div>
     <div class="c2">
           <p>Présences Statistiques</p>
             <div class="legend">
                 <span><span class="box presence"></span> Présence</span>
                 <span><span class="box retard"></span> Retard</span>
                 <span><span class="box absence"></span> Absence</span>
             </div>
             <select class="mois-filtre">
                 <option value="this-month">This Month</option>
                 <option value="jan">Janvier</option>
                 <option value="fev">Février</option>
                 <option value="mar">Mars</option>
                 <option value="avr">Avril</option>
                 <option value="mai">Mai</option>
                 <option value="jun">Juin</option>
                 <option value="jul">Juillet</option>
                 <option value="aou">Août</option>
                 <option value="sep">Septembre</option>
                 <option value="oct">Octobre</option>
                 <option value="nov">Novembre</option>
                 <option value="dec">Décembre</option>
             </select>
         <div class="graphe">
            
             <div class="bar">
             <div class="absence" style="height: 0%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 50%;"></div>
             <span class="label">Jan</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 0%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 60%;"></div>
             <span class="label">Feb</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">Mar</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">Apr</span>
             </div> 
             
             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">May</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">Jun</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">Jul</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">Aug</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">Sep</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">Oct</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">Nov</span>
             </div>

             <div class="bar">
             <div class="absence" style="height: 10%;"></div>
             <div class="retard" style="height: 20%;"></div>
             <div class="presence" style="height: 70%;"></div>
             <span class="label">Dec</span>
             </div>
         </div>
      
         </div>

 </div>


    <div class="troisieme">
                <div class="c3">
                    <div class="cercle">
                    <i class="fa-regular fa-user"></i>
                </div>

             <h1>180</h1>
             <p>Apprenants</p>

                <div class="ca1">
                    <i class="fa-solid fa-person-dress">35%</i>
                </div>
             <img src="/assets/images/diag.png" alt="">

             <div class="ca2">
              <i class="fa-solid fa-person">65%</i>
             </div>
        </div>

            <div class="c4">
                <img src="/assets/images/d.png"  alt="">
                <div class="stats-container">
                    <div class="stat-item">
                        <div class="circle full"><span>100%</span></div>
                        <div class="label">Taux d'insertion</div>
                        <div class="label1"> Professionnelle</div>

                    </div>
                    <div class="stat-item">
                        <div class="circle partial"><span>56%</span></div>
                        <div class="label">Taux de</div>
                        <div class="label2"> Féminisation</div>

                    </div>
                    <div class="stat-item">
                        <div class="icon people"></div>
                        <div class="sub-label">Communauté de plus de</div>
                        <div class="number">1000 <br> Développeurs</div>
                    </div>
                    <div class="stat-item">
                        <div class="icon cloud"></div>
                        <div class="orange-label">4 Centres</div>
                        <div class="region">Dakar, Diamniadio <br> Ziguinchor, et Saint-Louis</div>

                    </div>
                </div>


            </div>
       

    </div>
  


</main>


</body>
</html>



<?php
     $content = ob_get_clean();
     require_once __DIR__ . '/layout/base.layout.php';
?>