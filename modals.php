<div class="modal fade" id="editCliente" role="dialog">
	<div class="modal-dialog modal-lg">
		<form method="POST" id="form_geral">
			<div class="box box-primary">
				<div class="modal-content">
					<div class="box-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="box-title">Informações do retorno</h3>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<div class="row">
								<div id="div">
								</div>
					              <pre id="pre">
					              </pre>
							</div><!-- /.row -->
							<div class="col-md-13">
								<input type="hidden" name="id" id="id">
								<input type="hidden" name="tipo" id="tipo" value="<?=$tipo; ?>">
								<input type="hidden" name="user" id="user" value="<?=$nomeUsuario; ?>">
								<div class="col-md-6">
								<div class="form-group has-feedback">
										<label>Usuário Atribuido</label>
										<select class="form-control" id="usuario" name="usuario">
											
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Transferir Setor</label>
										<select class="form-control" id="setor" name="setor">
											<option selected="" disabled="">Setores</option>
											<option value="Suporte">Suporte</option>
					                          <option value="Suporte 2">Suporte 2</option>
					                          <option value="Comercial">Comercial</option>  
					                          <option value="Recepção">Recepção</option>
					                          <option value="Cobrança">Cobrança</option> 
					                          <option value="Ouvidoria">Ouvidoria</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Status</label>
										<select class="form-control" id="status" name="status">
											<option value="Aguardando retorno">Aguardando Retorno</option>
					                          <option value="Agendado">Agendado</option>  
					                          <option value="Retornando">Retornando</option>
					                          <option value="Sem retorno">Sem retorno</option>
					                          <option value="Em atendimento">Em atendimento</option>
										</select>
									</div>
									<div class="form-group has-feedback" style="display: none" id="div_hora">
							      		<label>Data Agendada</label>
							      		<input type="datetime-local" name="agendado" id="agendado" class="form-control">
							      	</div>
								</div>
								<div class="col-md-6">
									<label>Fazer ligação</label>
									<div class="input-group">
										<i class="fa fa-refresh fa-spin" style="display: none"></i>
										<span class="input-group-btn">
								        <button class="btn btn-primary" onclick="ligar()" type="button">Ligar!</button>
								      </span>
								      <select class="form-control" id="numeros">
								      	<option>Selecione um Número</option>
								      </select><br>
							      	</div>
							      	<div class="form-group has-feedback">
										<label>Observação</label>
										<textarea id="obs" name="obs" class="form-control" rows="3" cols="10"></textarea>
									</div>
								</div>
							</div>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="finalizar" class="btn btn-success">Finalizar</button>
				</div>
			</div>
		</form>
	</div>
</div>