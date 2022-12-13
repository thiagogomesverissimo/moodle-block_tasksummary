<div id="grafico" style=""></div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">submissions</th>
      <th scope="col">userid</th>
      <th scope="col">timecreated</th>
      <th scope="col">timecreated_next</th>
      <th scope="col">grade</th>
      <th scope="col">grade_next</th>
      <th scope="col">answer</th>
      <th scope="col">answer_next</th>
      <th scope="col">diff sec</th>
      <th scope="col">diff answer</th>
    </tr>
  </thead>
  <tbody>
    {{trs}}
  </tbody>
</table>

<b>Observações:</b>
<ul>
    <li>Na tabela acima somente estudantes que submeteram mais que uma vez a tarefa aparecem</li>
</ul>

<script src="https://cdn.plot.ly/plotly-2.16.4.min.js"></script>

<script>

    var pontos = {

        x: [{{difftime}}], //[1, 2, 3, 4],
        y: [{{diffanswer}}], //[10, 11, 12, 13],
        mode: 'markers',
        marker: {
            size: 8,
            color: [{{grade_next}}],
            colorscale: 'Blues',
            /*colorscale: [
              [0.000, "rgb(68, 1, 84)"],
              [0.111, "rgb(72, 40, 120)"],
              [0.222, "rgb(62, 74, 137)"],
              [0.333, "rgb(49, 104, 142)"],
              [0.444, "rgb(38, 130, 142)"],
              [0.556, "rgb(31, 158, 137)"],
              [0.667, "rgb(53, 183, 121)"],
              [0.778, "rgb(109, 205, 89)"],
              [0.889, "rgb(180, 222, 44)"],
              [1.000, "rgb(253, 231, 37)"]
            ],
            */
        }
    };

    var data = [pontos];

    var layout = {
      showlegend: true,
      title: {
        text:'Avaliando qualidade da tarefa: <br>{{enunciado}}',
        font: {
          family: 'Courier New, monospace',
          size: 24
        },
        xref: 'paper',
        x: 0.05,
      },

      xaxis: {
        title: {
          text: 'Intervalo de tempo entre as tentativas (ln(segundos))',
          font: {
            family: 'Courier New, monospace',
            size: 18,
            color: '#7f7f7f'
          }
        },
      },

      yaxis: {
        title: {
          text: 'Differença no código submetido',
          font: {
            family: 'Courier New, monospace',
            size: 14,
            color: '#7f7f7f'
          }
        }
      }
    };

    Grafico = document.getElementById('grafico');
    Plotly.newPlot(Grafico, data, layout);


</script>
