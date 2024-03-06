-- Table: public.mst_register

-- DROP TABLE IF EXISTS public.mst_register;

CREATE TABLE IF NOT EXISTS public.mst_register
(
    fullname text COLLATE pg_catalog."default",
    username text COLLATE pg_catalog."default",
    email text COLLATE pg_catalog."default",
    mobileno integer,
    pd text COLLATE pg_catalog."default",
    cpd text COLLATE pg_catalog."default",
    gender character(1) COLLATE pg_catalog."default",
    single character(1) COLLATE pg_catalog."default",
    married character(1) COLLATE pg_catalog."default"
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.mst_register
    OWNER to postgres;