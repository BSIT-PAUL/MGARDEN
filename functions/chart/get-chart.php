<?php

function current_chart($type = 'line'){
    global $db;
    $sql = "SELECT CURDATE() AS date,
    SUM(CASE
        WHEN r.type = 'day' THEN co.priceDay
        WHEN r.type = 'night' THEN co.priceNight
        WHEN r.type = 'package' THEN co.pricePackage
        ELSE 0 
    END) AS total_sales
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN cottages co ON r.cottage_id = co.id
    WHERE t.payment_status = 'Paid' 
    AND DATE(r.start_datetime) = CURDATE()  
    GROUP BY DATE(r.start_datetime)
    ORDER BY DATE(r.start_datetime);";
        
    $stmt = $db->prepare($sql);
    $stmt->execute();
        
    $labels = [];
    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $labels[] = date("D m", strtotime($row['date']));
        $data[] = $row['total_sales'];
    }
    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Earnings',
                'fill' => true,
                'data' => $data,
                'backgroundColor' => 'rgba(78, 115, 223, 0.05)',
                'borderColor' => 'rgba(11, 156, 49, 0.8 )'
            ]
        ]
    ];
    
    $chartDataJson = json_encode($chartData);  
    ?>
    <canvas data-bss-chart='{"type":"<?php echo $type?>","data":<?php echo $chartDataJson; ?>,"options":{"maintainAspectRatio":false,"legend":{"display":false,"labels":{"fontStyle":"normal"}},"title":{"fontStyle":"normal"},"scales":{"xAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"],"drawOnChartArea":false},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}],"yAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"]},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}]}}}'></canvas>
    <?php
  }

  function weekly_chart($type = 'line'){
    global $db;
    $sql = "SELECT YEAR(t.created_at) AS year, WEEK(t.created_at) AS week, SUM(CASE
    WHEN r.type = 'day' THEN co.priceDay
    WHEN r.type = 'night' THEN co.priceNight
    WHEN r.type = 'package' THEN co.pricePackage
    ELSE 0 
    END) AS total_sales
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN cottages co ON r.cottage_id = co.id
    WHERE t.status = 'Proceed' 
    GROUP BY YEAR(t.created_at), WEEK(t.created_at)
    ORDER BY YEAR(t.created_at), WEEK(t.created_at)";
            
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $labels = [];
    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $weekLabel = "Week " . $row['week'] . " (" . $row['year'] . ")";
        $labels[] = $weekLabel;
        $data[] = $row['total_sales'];
    }
    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Earnings',
                'fill' => true,
                'data' => $data,
                'backgroundColor' => 'rgba(11, 156, 49, 0.06)',
                'borderColor' => 'rgba(11, 156, 49, 0.6)'
            ]
        ]
    ];
    
    $chartDataJson = json_encode($chartData);
    
    ?>
    <canvas data-bss-chart='{"type":"<?php echo $type?>","data":<?php echo $chartDataJson; ?>,"options":{"maintainAspectRatio":false,"legend":{"display":false,"labels":{"fontStyle":"normal"}},"title":{"fontStyle":"normal"},"scales":{"xAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"],"drawOnChartArea":false},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}],"yAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"]},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}]}}}'></canvas>
    <?php
}


function month_chart($type = 'line') {
    global $db;
    
    // Get the current year
    $currentYear = date('Y');
    
    $sql = "SELECT YEAR(r.start_datetime) AS year, MONTH(r.start_datetime) AS month, SUM(CASE
        WHEN r.type = 'day' THEN co.priceDay
        WHEN r.type = 'night' THEN co.priceNight
        WHEN r.type = 'package' THEN co.pricePackage
        ELSE 0 
    END) AS total_sales
    FROM transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN cottages co ON r.cottage_id = co.id
    WHERE t.payment_status = 'Paid' 
    AND YEAR(r.start_datetime) = :currentYear
    GROUP BY YEAR(r.start_datetime), MONTH(r.start_datetime)
    ORDER BY YEAR(r.start_datetime), MONTH(r.start_datetime)";
        
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':currentYear', $currentYear, PDO::PARAM_INT);
    $stmt->execute();
  
    $labels = [];
    $data = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $monthName = date("M", mktime(0, 0, 0, $row['month'], 10));
        $labels[] = $monthName . ' ' . $row['year'];
        $data[] = $row['total_sales'];
    }
    
    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Earnings',
                'fill' => true,
                'data' => $data,
                'backgroundColor' => 'rgba(11, 156, 49, 0.3)',
                'borderColor' => 'rgba(78, 115, 223, 1)'
            ]
        ]
    ];

    $chartDataJson = json_encode($chartData);
    ?>
    <canvas data-bss-chart='{"type":"<?php echo $type?>","data":<?php echo $chartDataJson; ?>,"options":{"maintainAspectRatio":false,"legend":{"display":false,"labels":{"fontStyle":"normal"}},"title":{"fontStyle":"normal"},"scales":{"xAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"],"drawOnChartArea":false},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}],"yAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"]},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}]}}}'></canvas>
    <?php
}

  

function annual_chart($type = 'line'){
    global $db;
    $sql = "SELECT 
    YEAR(r.start_datetime) AS year, 
    SUM(
        CASE
            WHEN r.type = 'day' THEN co.priceDay
            WHEN r.type = 'night' THEN co.priceNight
            WHEN r.type = 'package' THEN co.pricePackage
            ELSE 0 
        END
    ) AS total_sales
FROM 
    transactions t
    JOIN rentals r ON t.id = r.transact_id
    JOIN cottages co ON r.cottage_id = co.id
WHERE 
    t.payment_status = 'Paid' 
    AND DATE_FORMAT(t.created_at, '%Y') = DATE_FORMAT(CURRENT_DATE, '%Y')
GROUP BY 
    YEAR(r.start_datetime)
ORDER BY 
    YEAR(r.start_datetime)
";
        
    $stmt = $db->prepare($sql);
    $stmt->execute();
  
    $labels = [];
    $data = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // $monthName = date("M", mktime(0, 0, 0, $row['month'], 10));
        $labels[] = $row['year'];
        $data[] = $row['total_sales'];
    }
    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Earnings',
                'fill' => true,
                'data' => $data,
                'backgroundColor' => 'rgba(11, 156, 49, 0.3)',
                'borderColor' => 'rgba(78, 115, 223, 1)'
            ]
        ]
    ];

    $chartDataJson = json_encode($chartData);
    ?>
    <canvas id="annualChart" width="400" height="200"></canvas>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('annualChart').getContext('2d');
            var annualChart = new Chart(ctx, {
                type: '<?php echo $type?>',
                data: <?php echo $chartDataJson; ?>,
                options: {
                    maintainAspectRatio: false,
                    legend: { display: false },
                    title: { display: true, text: 'Annual Sales' },
                    scales: {
                        xAxes: [{
                            gridLines: { display: false },
                            ticks: { fontColor: "#858796" }
                        }],
                        yAxes: [{
                            gridLines: { color: 'rgb(234, 236, 244)', zeroLineColor: 'rgb(234, 236, 244)', borderDash: [2], zeroLineBorderDash: [2] },
                            ticks: { fontColor: "#858796" }
                        }]
                    }
                }
            });
        });
    </script>
    <?php
}
