<?php
require_once '../app/includes/connection.php';

// Insertar noticias en la tabla news
$insert_news = "INSERT INTO NeoGymnasion.news (news_title, news_img, news_text, news_date, fk_user_id)
    VALUES
        ('Nueva Rutina de Entrenamiento para Principiantes', 'entrenamiento_principiantes.jpg', 'Descubre nuestra nueva rutina de entrenamiento diseñada especialmente para principiantes. Esta rutina te ayudará a empezar con el pie derecho y alcanzar tus objetivos de forma segura y efectiva.', '2024-01-01', 21),
        ('Dieta Balanceada para Deportistas', 'dieta_balanceada.jpg', 'Te presentamos una guía completa sobre cómo mantener una dieta balanceada si eres deportista. Incluye recetas y consejos para mantener tu energía al máximo.', '2024-01-02', 22),
        ('Clase de Yoga para Reducir el Estrés', 'yoga_estres.jpg', 'Unete a nuestras nuevas clases de yoga diseñadas para ayudarte a reducir el estrés y mejorar tu bienestar general. Disponibles todos los días a las 7 AM.', '2024-01-03', 23),
        ('Técnicas Avanzadas de Levantamiento de Pesas', 'levantamiento_pesas.jpg', 'Aprende técnicas avanzadas para mejorar tu levantamiento de pesas. Aumenta tu fuerza y evita lesiones con estos consejos de nuestros expertos.', '2024-01-04', 21),
        ('Importancia del Descanso en el Entrenamiento', 'descanso_entrenamiento.jpg', 'El descanso es una parte crucial del entrenamiento. Descubre por qué es importante y cómo puedes optimizar tus periodos de descanso para mejores resultados.', '2024-01-05', 22),
        ('Entrenamiento Funcional: Beneficios y Ejercicios', 'entrenamiento_funcional.jpg', 'El entrenamiento funcional te ayuda a mejorar tu fuerza y coordinación. Conoce sus beneficios y descubre ejercicios que puedes incorporar a tu rutina.', '2024-01-06', 23),
        ('Maratón Anual NeoGymnasion: ¡Inscripciones Abiertas!', 'maraton_anual.jpg', 'No te pierdas nuestra maratón anual. Las inscripciones están abiertas y todos los participantes recibirán un kit especial. ¡Prepárate para el desafío!', '2024-01-07', 21),
        ('Nutrición para Ganancia Muscular', 'nutricion_ganancia_muscular.jpg', 'Si tu objetivo es ganar masa muscular, esta guía de nutrición es para ti. Aprende qué alimentos incluir en tu dieta para maximizar tus ganancias.', '2024-01-08', 22),
        ('Beneficios del Entrenamiento al Aire Libre', 'entrenamiento_aire_libre.jpg', 'El entrenamiento al aire libre ofrece muchos beneficios, tanto físicos como mentales. Descubre por qué deberías probarlo y cómo empezar.', '2024-01-09', 23),
        ('Clases de Zumba: Diversión y Ejercicio', 'clases_zumba.jpg', 'Nuestras clases de Zumba son la forma perfecta de combinar diversión y ejercicio. Quema calorías al ritmo de la música y disfruta de un ambiente energizante.', '2024-01-10', 21),
        ('Entrenamiento de Alta Intensidad (HIIT)', 'entrenamiento_HIIT.jpg', 'El entrenamiento HIIT es ideal para quienes buscan resultados rápidos en poco tiempo. Conoce sus beneficios y descubre una rutina que puedes seguir.', '2024-01-11', 22),
        ('Cuidado y Prevención de Lesiones', 'prevencion_lesiones.jpg', 'Prevenir lesiones es fundamental para cualquier deportista. Aprende cómo cuidarte y qué hacer en caso de lesión para una recuperación rápida.', '2024-01-12', 23),
        ('Retiro de Bienestar NeoGymnasion', 'retiro_bienestar.jpg', 'Únete a nuestro retiro de bienestar, donde combinaremos ejercicio, relajación y talleres sobre salud y bienestar. Una experiencia única para renovar tu cuerpo y mente.', '2024-01-13', 21),
        ('Importancia del Hidratación en el Deporte', 'hidratacion_deporte.jpg', 'Mantenerse hidratado es esencial para el rendimiento deportivo. Descubre la importancia de la hidratación y cómo mantener un nivel óptimo de líquidos.', '2024-01-14', 22),
        ('Programa de Entrenamiento Personalizado', 'entrenamiento_personalizado.jpg', 'Ofrecemos programas de entrenamiento personalizados que se adaptan a tus objetivos y necesidades específicas. Conoce más sobre cómo podemos ayudarte a alcanzar tus metas.', '2024-01-15', 23),
        ('Mindfulness y Meditación para Deportistas', 'mindfulness_meditacion.jpg', 'El mindfulness y la meditación pueden mejorar tu rendimiento deportivo. Aprende cómo estas prácticas pueden ayudarte a mantener la concentración y reducir el estrés.', '2024-01-16', 21),
        ('Suplementos Deportivos: Guía Completa', 'suplementos_deportivos.jpg', 'Infórmate sobre los diferentes tipos de suplementos deportivos y cuáles son los más adecuados para ti según tus objetivos y nivel de actividad.', '2024-01-17', 22),
        ('Entrenamiento para la Flexibilidad', 'entrenamiento_flexibilidad.jpg', 'La flexibilidad es clave para prevenir lesiones y mejorar el rendimiento. Descubre ejercicios y rutinas que te ayudarán a aumentar tu flexibilidad.', '2024-01-18', 23),
        ('Evento Especial: Competencia de CrossFit', 'competencia_crossfit.jpg', 'Participa en nuestra competencia de CrossFit y demuestra tus habilidades. Inscripciones abiertas para todos los niveles.', '2024-01-19', 21),
        ('Consejos para Mejorar tu Resistencia', 'mejorar_resistencia.jpg', 'Mejora tu resistencia con estos consejos y ejercicios. Ideal para corredores, ciclistas y cualquier persona que quiera aumentar su capacidad aeróbica.', '2024-01-20', 22)";

if (mysqli_query($conn, $insert_news)) {
    echo "Noticias insertadas correctamente.<br>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
