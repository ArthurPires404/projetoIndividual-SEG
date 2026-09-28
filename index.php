<?php

// Importação simples indicando a pasta src/
require_once 'src/Pessoa.php';
require_once 'src/Aluno.php';
require_once 'src/Professor.php';
require_once 'src/Plano.php';
require_once 'src/Matricula.php';
require_once 'src/Exercicio.php';
require_once 'src/Treino.php';
require_once 'src/Pagamento.php';

// Criando os objetos
$aluno1 = new Aluno("João Silva", "111.111.111-11", "joao@email.com", "ALU001");
$aluno2 = new Aluno("Maria Oliveira", "222.222.222-22", "maria@email.com", "ALU002");

$professor1 = new Professor("Carlos Santos", "333.333.333-33", "carlos@email.com", "Musculação", "CREF001");
$professor2 = new Professor("Ana Costa", "444.444.444-44", "ana@email.com", "Pilates", "CREF002");

// Array com os objetos
$pessoas = [$aluno1, $aluno2, $professor1, $professor2];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Academia</title>
    <style>
        :root {
            --bg-color: #f4f6f9;
            --card-bg: #ffffff;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --primary-color: #3b82f6;
            --accent-aluno: #10b981;
            --accent-prof: #8b5cf6;
            --border-color: #e5e7eb;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg-color: #0f172a;
                --card-bg: #1e293b;
                --text-primary: #f8fafc;
                --text-secondary: #94a3b8;
                --border-color: #334155;
                --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            }
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-primary);
            padding: 2rem 1rem;
            min-height: 100vh;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        header h1 {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        header p {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 0.5rem;
        }

        .grid-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 1rem;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .card.aluno::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background-color: var(--accent-aluno);
        }

        .card.professor::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background-color: var(--accent-prof);
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 9999px;
            margin-bottom: 1rem;
        }

        .card.aluno .badge {
            background-color: rgba(16, 185, 129, 0.15);
            color: var(--accent-aluno);
        }

        .card.professor .badge {
            background-color: rgba(139, 92, 246, 0.15);
            color: var(--accent-prof);
        }

        .card-apresentacao {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            line-height: 1.5;
        }

        .card-details {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px dashed var(--border-color);
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .card-details p {
            margin-bottom: 0.25rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>🏋️‍♂️ Sistema de Academia</h1>
            <p>Versão Final — Exemplo de Polimorfismo em PHP</p>
        </header>

        <main>
            <h2 class="section-title">👥 Pessoas da Academia</h2>

            <div class="grid-cards">
                <?php 
                foreach ($pessoas as $pessoa) {
                    // Lógica com if/else simples para identificar o tipo
                    if ($pessoa instanceof Aluno) {
                        $tipo = "aluno";
                        $rotulo = "Aluno";
                    } else {
                        $tipo = "professor";
                        $rotulo = "Professor";
                    }
                ?>
                    <div class="card <?php echo $tipo; ?>">
                        <span class="badge"><?php echo $rotulo; ?></span>
                        
                        <div class="card-apresentacao">
                            <?php $pessoa->apresentar(); ?>
                        </div>

                        <div class="card-details">
                            <p><strong>Nome:</strong> <?php echo $pessoa->getNome(); ?></p>
                            <p><strong>E-mail:</strong> <?php echo $pessoa->getEmail(); ?></p>
                        </div>
                    </div>
                <?php 
                } 
                ?>
            </div>
        </main>
    </div>

</body>
</html>