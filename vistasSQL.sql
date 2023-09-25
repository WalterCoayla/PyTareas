----------------------------
CREATE VIEW v_empleados AS
SELECT
    e.*,
    d.departamento,
    c.cargo
FROM empleados e
    INNER JOIN departamentos d ON e.departamentos_id = d.id
    INNER JOIN cargos c ON e.cargos_id = c.id

---------------------------

CREATE VIEW v_tareas AS
SELECT
    t.*,
    e.estado,
    em.nombres,
    em.apellidos
FROM tareas t
    INNER JOIN estados e ON t.estados_id = e.id
    LEFT JOIN empleados em ON t.empleados_id = em.id

---------------
