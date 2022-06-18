from random import sample, randint
m = ["H&M","Louis Vuitton","Dior","Zara"]
d = ["Prenda masculina con cuello y manga corta.","Prenda masculina que se ajusta a la cintura y llega a los tobillos cubriendo las piernas.",
"Prenda femenina que se ajusta a la cintura y llega a los tobillos cubriendo las piernas.",
"Prenda de vestir masculina con cuello que se abrocha y tiene manga larga.",
"Abrigo femenino que cubre el dorso, tiene manga larga y cuello alto.",
"Abrigo masculino que cubre el corso, tiene manga larga y se puede abrir y cerrar.",
"Prenda femenina con cuello y manga corta.","Traje de mujer que se compone de una falda y cuerpo en una misma pieza."]
t = ["Polo","Pantalon hombre","Pantalon mujer","Camisa","Polera mujer","Casaca hombre","Blusa","Vestido"]
for i in range(len(t)):
	#print(sample(t,1)[0])
	#print(i)
	for j in range(len(m)):
		print(t[i])#+str(" ")+m[j])# + str(" ")+m[j])


print(len(t))

#input()